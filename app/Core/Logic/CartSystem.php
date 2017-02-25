<?php

namespace App\Core\Logic;

use App\Core\Contracts\Buyable;
use App\Core\Exceptions\CartAlreadyStoredException;
use App\Core\Exceptions\InvalidRowIDException;
use App\Core\Exceptions\UnknownModelException;
use App\Core\Repositories\CartRepository;
use App\Core\Repositories\ProductsRepository;
use App\Core\Support\Cart\CartItem;
use app\Core\Contracts\CartSystemContract;
use App\Core\Support\Cart\CartItemContract;
use Illuminate\Events\Dispatcher;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

/**
 * Class CartSystem
 *
 * @package app\Core\Logic
 */
class CartSystem implements CartSystemContract
{
    const DEFAULT_INSTANCE = 'cart';

    /**
     * @var ProductsRepository
     */
    public $productsRepository;
    /**
     * @var CartRepository
     */
    public $cartRepository;
    /**
     * Instance of the session manager.
     *
     * @var \Illuminate\Session\SessionManager
     */
    private $session;
    /**
     * Instance of the event dispatcher.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    private $events;
    /**
     * Holds the current cart instance.
     *
     * @var string
     */
    private $instance;

    /**
     * CartSystem constructor.
     * @param SessionManager $session
     * @param Dispatcher $events
     * @param CartRepository $cartRepository
     * @param ProductsRepository $productsRepository
     */
    public function __construct(SessionManager $session, Dispatcher $events,
                                CartRepository $cartRepository, ProductsRepository $productsRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->session = $session;
        $this->events = $events;
        $this->productsRepository = $productsRepository;

        $this->instance(self::DEFAULT_INSTANCE);
    }

    /**
     * @param array $data
     * @param bool $withAggregations
     * @return Collection
     */
    public function show(array $data, bool $withAggregations=true)
    {
        $cart = $this->content();

        return $cart;
    }

    /**
     * @param array $data
     * @param $productId
     * @return array|mixed
     */
    public function addItem(array $data, $productId)
    {
        $product = $this->productsRepository->find($productId);
        $productMedia = $product->getMedia('gallery');
        $quantity = isset($data['quantity']) ? $data['quantity'] : 1;
        $options = isset($data['options']) ? $data['options'] : [];
        $options['status'] = $product->getStockStatus();
        $options['thumb'] = $productMedia->count() ? $productMedia->first()->getUrl() : asset("/img/Image-not-found.gif");
        return $this->add($product, null, $quantity, null, $options);
    }

    /**
     * Set the current cart instance.
     *
     * @param null $instance
     * @return $this
     */
    public function instance($instance = null)
    {
        $instance = $instance ?: self::DEFAULT_INSTANCE;
        $this->instance = sprintf('%s.%s', 'cart', $instance);
        return $this;
    }
    /**
     * Get the current cart instance.
     *
     * @return string
     */
    public function currentInstance()
    {
        return str_replace('cart.', '', $this->instance);
    }

    /**
     * Add an item to the cart.
     *
     * @param $id
     * @param null $name
     * @param null $qty
     * @param null $price
     * @param array $options
     * @return array|mixed
     */
    public function add($id, $name = null, $qty = null, $price = null, array $options = [])
    {
        if ($this->isMulti($id)) {
            return array_map(function ($item) {
                return $this->add($item);
            }, $id);
        }
        $cartItem = $this->createCartItem($id, $name, $qty, $price, $options);
        $content = $this->getContent();
        if ($content->has($cartItem->rowId)) {
            $cartItem->qty += $content->get($cartItem->rowId)->qty;
        }
        $content->put($cartItem->rowId, $cartItem);

        $this->events->fire('cart.added', $cartItem);
        $this->session->put($this->instance, $content);
        return $cartItem;
    }

    /**
     * Update the cart item with the given rowId.
     *
     * @param $rowId
     * @param $qty
     * @return CartItem|void
     */
    public function update($rowId, $qty)
    {
        $cartItem = $this->find($rowId);
        if ($qty instanceof Buyable) {
            $cartItem->updateFromBuyable($qty);
        } elseif (is_array($qty)) {
            $cartItem->updateFromArray($qty);
        } else {
            $cartItem->qty = $qty;
        }
        $content = $this->getContent();
        if ($rowId !== $cartItem->rowId) {
            $content->pull($rowId);
            if ($content->has($cartItem->rowId)) {
                $existingCartItem = $this->find($cartItem->rowId);
                $cartItem->setQuantity($existingCartItem->qty + $cartItem->qty);
            }
        }
        if ($cartItem->qty <= 0) {
            $this->remove($cartItem->rowId);
            return;
        } else {
            $content->put($cartItem->rowId, $cartItem);
        }
        $this->events->fire('cart.updated', $cartItem);
        $this->session->put($this->instance, $content);
        return $cartItem;
    }
    /**
     * Remove the cart item with the given rowId from the cart.
     *
     * @param string $rowId
     * @return void
     */
    public function remove($rowId)
    {
        $cartItem = $this->find($rowId);
        $content = $this->getContent();
        $content->pull($cartItem->rowId);
        $this->events->fire('cart.removed', $cartItem);
        $this->session->put($this->instance, $content);
    }
    /**
     * Get a cart item from the cart by its rowId.
     *
     * @param string $rowId
     * @return CartItem
     */
    public function find($rowId)
    {
        $content = $this->getContent();
        if ( ! $content->has($rowId))
            throw new InvalidRowIDException("The cart does not contain rowId {$rowId}.");
        return $content->get($rowId);
    }
    /**
     * Destroy the current cart instance.
     *
     * @return void
     */
    public function destroy()
    {
        $this->session->remove($this->instance);
    }

    /**
     * Get the content of the cart.
     *
     * @return \Illuminate\Support\Collection
     */
    public function content(): Collection
    {
        if (is_null($this->session->get($this->instance))) {
            return new Collection([]);
        }
        return $this->session->get($this->instance);
    }
    /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
    public function count()
    {
        $content = $this->getContent();
        return $content->sum('qty');
    }

    /**
     * Get the total price of the items in the cart.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function total($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        $content = $this->getContent();
        $total = $content->reduce(function ($total, $cartItem) {
            return $total + ($cartItem->qty * $cartItem->priceTax);
        }, 0);
        return cartNumberFormat($total, $decimals, $decimalPoint, $thousandSeperator);
    }
    /**
     * Get the total tax of the items in the cart.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return float
     */
    public function tax($decimals = null, $decimalPoint = null, $thousandSeperator = null): float
    {
        $content = $this->getContent();
        $tax = $content->reduce(function ($tax, CartItem $cartItem) {
            return $tax + ($cartItem->qty * $cartItem->tax);
        }, 0);
        return cartNumberFormat($tax, $decimals, $decimalPoint, $thousandSeperator);
    }
    /**
     * Get the subtotal (total - tax) of the items in the cart.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return float|string
     */
    public function subtotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        $content = $this->getContent();
        $subTotal = $content->reduce(function ($subTotal, CartItem $cartItem) {
            return $subTotal + ($cartItem->qty * $cartItem->price);
        }, 0);
        return cartNumberFormat($subTotal, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Search the cart content for a cart item matching the given search closure.
     *
     * @param \Closure $search
     * @return Collection
     */
    public function search(\Closure $search): Collection
    {
        $content = $this->getContent();
        return $content->filter($search);
    }

    /**
     * Associate the cart item with the given rowId with the given model.
     *
     * @param string $rowId
     * @param mixed  $model
     * @return void
     */
    public function associate($rowId, $model)
    {
        if(is_string($model) && ! class_exists($model)) {
            throw new UnknownModelException("The supplied model {$model} does not exist.");
        }
        $cartItem = $this->find($rowId);
        $cartItem->associate($model);
        $content = $this->getContent();
        $content->put($cartItem->rowId, $cartItem);
        $this->session->put($this->instance, $content);
    }
    /**
     * Set the tax rate for the cart item with the given rowId.
     *
     * @param string    $rowId
     * @param int|float $taxRate
     * @return void
     */
    public function setTax($rowId, $taxRate)
    {
        $cartItem = $this->find($rowId);
        $cartItem->setTaxRate($taxRate);
        $content = $this->getContent();
        $content->put($cartItem->rowId, $cartItem);
        $this->session->put($this->instance, $content);
    }

    /**
     * Store an the current instance of the cart.
     *
     * @param mixed $identifier
     * @return void
     */
    public function store($identifier)
    {
        $content = $this->getContent();
        if ($this->storedCartWithIdentifierExists($identifier)) {
            throw new CartAlreadyStoredException("A cart with identifier {$identifier} was already stored.");
        }
        $this->cartRepository->create([
            'unique_id' => $identifier,
            'user_id' => !\Auth::guest() ? \Auth::user()->id : null,
            'instance' => $this->currentInstance(),
            'content' => json_encode($content)
        ]);
        $this->events->fire('cart.stored');
    }

    /**
     * Restore the cart with the given identifier.
     *
     * @param mixed $identifier
     * @return void
     */
    public function restore($identifier)
    {
        if( ! $this->storedCartWithIdentifierExists($identifier)) {
            return;
        }
        $stored = $this->cartRepository
            ->find($identifier);
        $storedContent = json_decode($stored->content);
        $currentInstance = $this->currentInstance();
        $this->instance($stored->instance);
        $content = $this->getContent();
        foreach ($storedContent as $cartItem) {
            $content->put($cartItem->rowId, $cartItem);
        }
        $this->events->fire('cart.restored');
        $this->session->put($this->instance, $content);
        $this->instance($currentInstance);
        $this->cartRepository->delete($identifier);
    }
    /**
     * Magic method to make accessing the total, tax and subtotal properties possible.
     *
     * @param string $attribute
     * @return float|null
     */
    public function __get($attribute)
    {
        if($attribute === 'total') {
            return $this->total();
        }
        if($attribute === 'tax') {
            return $this->tax();
        }
        if($attribute === 'subtotal') {
            return $this->subtotal();
        }
        return null;
    }
    /**
     * Get the carts content, if there is no cart content set yet, return a new empty Collection
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        $content = $this->session->has($this->instance)
            ? $this->session->get($this->instance)
            : new Collection();
        return $content;
    }

    /**
     * Create a new CartItem from the supplied attributes.
     *
     * @param $id
     * @param $name
     * @param $qty
     * @param $price
     * @param array $options
     * @return mixed
     */
    private function createCartItem($id, $name, $qty, $price, array $options)
    {
        //detect if $id is model and implements Buyable Interface
        if ($id instanceof Buyable) {
            $cartItem = CartItem::fromBuyable($id, $options ? $options : []);
            $cartItem->setQuantity($qty ?: 1);
            $cartItem->associate($id);
        } elseif (is_array($id)) {
            $cartItem = CartItem::fromArray($id);
            $cartItem->setQuantity($id['qty']);
        } else {
            $cartItem = CartItem::fromAttributes($id, $name, $price, $options);
            $cartItem->setQuantity($qty);
        }
        $cartItem->setTaxRate(config('cart.tax'));
        return $cartItem;
    }
    /**
     * Check if the item is a multidimensional array or an array of Buyables.
     *
     * @param mixed $item
     * @return bool
     */
    private function isMulti($item): bool
    {
        if ( ! is_array($item)) return false;
        return is_array(head($item)) || head($item) instanceof Buyable;
    }

    /**
     * @param $identifier
     * @return bool
     */
    private function storedCartWithIdentifierExists($identifier): bool
    {
        return count($this->cartRepository->where('unique_id', $identifier)) > 0 ?? false;
    }
}