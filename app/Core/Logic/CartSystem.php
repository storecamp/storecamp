<?php

namespace App\Core\Logic;

use App\Core\Contracts\Buyable;
use app\Core\Contracts\CartSystemContract;
use App\Core\Exceptions\CartAlreadyStoredException;
use App\Core\Exceptions\InvalidRowIDException;
use App\Core\Exceptions\UnknownModelException;
use App\Core\Exceptions\UserNotLoggedInException;
use App\Core\Models\Cart;
use App\Core\Repositories\CartRepository;
use App\Core\Repositories\ProductsRepository;
use App\Core\Support\Cart\CartItem;
use Illuminate\Auth\AuthManager;
use Illuminate\Events\Dispatcher;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

/**
 * Class CartSystem.
 */
class CartSystem implements CartSystemContract
{
    const DEFAULT_INSTANCE = 'cart';

    /**
     * @var ProductsRepository
     */
    public $productsRepository;
    /**
     * @var Cart
     */
    public $cart;
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
     * @var bool
     */
    private $withCurrency = false;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var AuthManager
     */
    private $auth;

    /**
     *
     * CartSystem constructor.
     *
     * @param SessionManager $session
     * @param Dispatcher $events
     * @param Cart $cart
     * @param ProductsRepository $productsRepository
     * @param AuthManager $auth
     */
    public function __construct(SessionManager $session,
                                Dispatcher $events,
                                Cart $cart,
                                ProductsRepository $productsRepository,
                                AuthManager $auth)
    {
        $this->cart = $cart;
        $this->session = $session;
        $this->events = $events;
        $this->productsRepository = $productsRepository;
        $this->currency = config('sales.currency');
        $this->auth = $auth;
        $this->instance(self::DEFAULT_INSTANCE);
    }

    /**
     * @param array $data
     * @param bool $withAggregations
     *
     * @return Collection
     */
    public function show(array $data, bool $withAggregations = true)
    {
        if (isset($data['instance'])) {
            $cart = $this->instance($data['instance'])->content();
        } else {
            $cart = $this->content();
        }

        return $cart;
    }

    /**
     * @param array $data
     * @param $productId
     *
     * @return array|mixed
     */
    public function addItem(array $data, $productId)
    {
        $product = $this->productsRepository->find($productId);
        $quantity = isset($data['quantity']) ? $data['quantity'] : 1;
        $options = isset($data['options']) ? $data['options'] : [];
        if (isset($data['instance'])) {
            return $this->instance($data['instance'])->add($product, $quantity, $options);
        } else {
            return $this->add($product, $quantity, $options);
        }
    }

    /**
     * @param string $currency
     *
     * @return CartSystem
     */
    public function setCurrency(string $currency): CartSystem
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return CartSystem
     */
    public function withCurrency(string $currency = null): CartSystem
    {
        $this->currency = $currency ?? $this->currency;
        $this->withCurrency = true;

        return $this;
    }

    /**
     * Set the current cart instance.
     *
     * @param null $instance
     *
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
     * @param null $qty
     * @param array $options
     *
     * @return CartItem|array
     */
    public function add($id, $qty = null, array $options = [])
    {
        if ($this->isMulti($id)) {
            return array_map(function ($item) {
                return $this->add($item);
            }, $id);
        }
        $cartItem = $this->createCartItem($id, $qty, $options);
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
     *
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
     *
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
     *
     * @return CartItem
     */
    public function find($rowId)
    {
        $content = $this->getContent();
        if (!$content->has($rowId)) {
            throw new InvalidRowIDException("The cart does not contain rowId {$rowId}.");
        }

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
        $content = $this->session->get($this->instance);

        return $content;
    }

    /**
     * recheck items in the cart
     * with products table.
     *
     * @param $content
     *
     * @return mixed
     */
    private function checkItems($content)
    {
        foreach ($content as $item) {
            $cartProduct = $item->getProduct();
            if (!$cartProduct) {
                $content->pull($item->rowId);
                $this->events->fire('cart.removed', $item);
                $this->session->put($this->instance, $content);
            }
        }
        $content = $this->session->get($this->instance);
        if (!$content) {
            return new Collection();
        }

        return $content;
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
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     *
     * @return string
     */
    public function total($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        $content = $this->getContent();
        $total = $content->reduce(function ($total, $cartItem) {
            return $total + ($cartItem->qty * $cartItem->priceTax);
        }, 0);
        $currency = $this->withCurrency ? $this->currency . ' ' : null;

        return $currency . cartNumberFormat($total, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Get the total tax of the items in the cart.
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     *
     * @return float
     */
    public function tax($decimals = null, $decimalPoint = null, $thousandSeperator = null)
    {
        $content = $this->getContent();
        $tax = $content->reduce(function ($tax, CartItem $cartItem) {
            return $tax + ($cartItem->qty * $cartItem->tax);
        }, 0);
        $currency = $this->withCurrency ? $this->currency . ' ' : null;

        return $currency . cartNumberFormat($tax, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Get the subtotal (total - tax) of the items in the cart.
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     *
     * @return float|string
     */
    public function subtotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        $content = $this->getContent();
        $subTotal = $content->reduce(function ($subTotal, CartItem $cartItem) {
            if ($cartItem->product) {
                return $subTotal + ($cartItem->qty * $cartItem->product->price);
            } else {
                return 0;
            }
        }, 0);
        $currency = $this->withCurrency ? $this->currency . ' ' : null;

        return $currency . cartNumberFormat($subTotal, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Search the cart content for a cart item matching the given search closure.
     *
     * @param \Closure $search
     *
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
     * @param mixed $model
     *
     * @return void
     */
    public function associate($rowId, $model)
    {
        if (is_string($model) && !class_exists($model)) {
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
     * @param string $rowId
     * @param int|float $taxRate
     *
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
     * TODO implement db transaction.
     *
     * Transforms cart into an order.
     * Returns created order.
     *
     * @param null $statusCode
     *
     * @throws UserNotLoggedInException
     *
     * @return mixed
     */
    public function placeOrder($statusCode = null)
    {
        if (empty($statusCode)) {
            $statusCode = config('sales.order_status_placement');
        }
        if ($this->auth->user()->guest()) {
            throw new UserNotLoggedInException('Order placement requires logged in user.');
        }
        // Create order
        $order = call_user_func(config('sales.order') . '::create', [
            'user_id' => $this->auth->user()->id,
            'statusCode' => $statusCode,
        ]);
        $cart = $this->store($this->content()->rowId());
        $cart->order_id = $order->id;
        $cart->save();

        return $order;
    }

    /**
     * @param mixed $identifier
     *
     * @throws UserNotLoggedInException
     *
     * @return mixed
     */
    public function store($identifier)
    {
        $content = $this->getContent();
        if ($this->storedCartWithIdentifierExists($identifier)) {
            throw new CartAlreadyStoredException("A cart with identifier {$identifier} was already stored.");
        }

        if ($this->auth->user()->guest()) {
            throw new UserNotLoggedInException("A cart with identifier {$identifier} requires logged in user.");
        }

        $cart = $this->cart->create([
            'unique_id' => $identifier,
            'user_id' => $this->auth->user()->id,
            'instance' => $this->currentInstance(),
            'content' => json_encode($content),
        ]);
        $this->events->fire('cart.stored');

        return $cart;
    }

    /**
     * Restore the cart with the given identifier.
     *
     * @param mixed $identifier
     *
     * @return void
     */
    public function restore($identifier)
    {
        if (!$this->storedCartWithIdentifierExists($identifier)) {
            return;
        }
        $stored = $this->cart
            ->findOrFail($identifier);
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
        $this->cart->destroy($identifier);
    }

    /**
     * Magic method to make accessing the total, tax and subtotal properties possible.
     *
     * @param string $attribute
     *
     * @return float|null
     */
    public function __get($attribute)
    {
        if ($attribute === 'total') {
            return $this->total();
        }
        if ($attribute === 'tax') {
            return $this->tax();
        }
        if ($attribute === 'subtotal') {
            return $this->subtotal();
        }
    }

    /**
     * Get the carts content, if there is no cart content set yet, return a new empty Collection.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        $content = $this->session->has($this->instance)
            ? $this->session->get($this->instance)
            : new Collection();
        $content = $this->checkItems($content);

        return $content;
    }

    /**
     * Create a new CartItem from the supplied attributes.
     *
     * @param $id
     * @param $qty
     * @param array $options
     *
     * @return CartItem
     */
    private function createCartItem($id, $qty, array $options)
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
            $cartItem = CartItem::fromAttributes($id, $options);
            $cartItem->setQuantity($qty);
        }
        $cartItem->setCurrency($this->currency);
        $cartItem->setTaxRate(config('sales.tax_percent'));

        return $cartItem;
    }

    /**
     * Check if the item is a multidimensional array or an array of Buyables.
     *
     * @param mixed $item
     *
     * @return bool
     */
    private function isMulti($item): bool
    {
        if (!is_array($item)) {
            return false;
        }

        return is_array(head($item)) || head($item) instanceof Buyable;
    }

    /**
     * @param $identifier
     *
     * @return bool
     */
    private function storedCartWithIdentifierExists($identifier): bool
    {
        return count($this->cart->where('unique_id', $identifier)) > 0 ?? false;
    }
}
