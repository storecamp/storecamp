<?php

namespace App\Core\Support\Cart;

use App\Core\Models\User;
use Illuminate\Contracts\Support\Arrayable;
use App\Core\Contracts\Buyable;

class CartItem implements Arrayable, CartItemContract
{
    /**
     * The rowID of the cart item.
     *
     * @var string
     */
    public $rowId;

    /**
     * @var int|string
     */
    public $userId;
    /**
     * The ID of the cart item.
     *
     * @var int|string
     */
    public $id;

    /**
     * The quantity for this cart item.
     *
     * @var int|float
     */
    public $qty;

    /**
     * The name of the cart item.
     *
     * @var string
     */
    public $name;

    /**
     * The price without TAX of the cart item.
     *
     * @var float
     */
    public $price;


    /**
     * The options for this cart item.
     *
     * @var array
     */
    public $options;

    /**
     * The FQN of the associated model.
     *
     * @var string|null
     */
    private $associatedModel = null;

    /**
     * The tax rate for the cart item.
     *
     * @var int|float
     */
    private $taxRate = 0;

    /**
     * CartItem constructor.
     *
     * @param int|string $id
     * @param string     $name
     * @param float      $price
     * @param array      $options
     */
    public function __construct($id, string $name, float $price, array $options = [])
    {
        if(empty($id)) {
            throw new \InvalidArgumentException('Please supply a valid identifier.');
        }
        if(empty($name)) {
            throw new \InvalidArgumentException('Please supply a valid name.');
        }
        if(strlen($price) < 0 || ! is_numeric($price)) {
            throw new \InvalidArgumentException('Please supply a valid price.');
        }

        $this->id       = $id;
        $this->userId       = \Auth::check() ? \Auth::user()->id : null;
        $this->name     = $name;
        $this->price    = floatval($price);
        $this->options  = new CartItemOptions($options);
        $this->rowId = $this->generateRowId($id, $options);
    }

    /**
     * Get an attribute from the cart item or get the associated model.
     *
     * @param string $attribute
     * @return mixed
     */
    public function __get($attribute)
    {
        if(property_exists($this, $attribute)) {
            return $this->{$attribute};
        }

        if($attribute === 'priceTax') {
            return round($this->price + $this->tax, 2);
        }

        if($attribute === 'subtotal') {
            return round($this->qty * $this->price, 2);
        }

        if($attribute === 'total') {
            return round($this->qty * ($this->priceTax), 2);
        }

        if($attribute === 'tax') {
            return $this->price * ($this->taxRate / 100);
        }

        if($attribute === 'taxTotal') {
            return $this->tax * $this->qty;
        }

        if($attribute === 'user') {
            return $this->userId ? User::find($this->userId) : null;
        }

        if($attribute === 'model') {
            return with(new $this->associatedModel)->find($this->id);
        }

        return null;
    }

    /**
     * Returns the formatted price without TAX.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function price($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        return cartNumberFormat($this->price, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns the formatted price with TAX.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function priceTax($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        return cartNumberFormat($this->priceTax, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns the formatted subtotal.
     * Subtotal is price for whole CartItem without TAX
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function subtotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        return cartNumberFormat($this->subtotal, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns the formatted total.
     * Total is price for whole CartItem with TAX
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function total($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        return cartNumberFormat($this->total, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns the formatted tax.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function tax($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        return cartNumberFormat($this->tax, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns the formatted tax.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function taxTotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string
    {
        return cartNumberFormat($this->taxTotal, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Set the quantity for this cart item.
     *
     * @param int|float $qty
     */
    public function setQuantity($qty)
    {
        if(empty($qty) || ! is_numeric($qty))
            throw new \InvalidArgumentException('Please supply a valid quantity.');

        $this->qty = $qty;
    }

    /**
     * Update the cart item from a Buyable.
     *
     * @param Buyable $item
     */
    public function updateFromBuyable(Buyable $item)
    {
        $this->id       = $item->getBuyableIdentifier($this->options);
        $this->name     = $item->getBuyableDescription($this->options);
        $this->price    = $item->getBuyablePrice($this->options);
        $this->priceTax = $this->price + $this->tax;
    }

    /**
     * Update the cart item from an array.
     *
     * @param array $attributes
     * @return void
     */
    public function updateFromArray(array $attributes)
    {
        $this->id       = array_get($attributes, 'id', $this->id);
        $this->qty      = array_get($attributes, 'qty', $this->qty);
        $this->name     = array_get($attributes, 'name', $this->name);
        $this->price    = array_get($attributes, 'price', $this->price);
        $this->priceTax = $this->price + $this->tax;
        $this->options  = new CartItemOptions(array_get($attributes, 'options', $this->options));

        $this->rowId = $this->generateRowId($this->id, $this->options->all());
    }

    /**
     * Associate the cart item with the given model.
     *
     * @param $model
     * @return CartItem
     */
    public function associate($model): CartItem
    {
        $this->associatedModel = is_string($model) ? $model : get_class($model);

        return $this;
    }

    /**
     * Set the tax rate.
     *
     * @param $taxRate
     * @return CartItem
     */
    public function setTaxRate($taxRate): CartItem
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Create a new instance from a Buyable.
     *
     * @param Buyable $item
     * @param array $options
     * @return CartItem
     */
    public static function fromBuyable($item, array $options = []): CartItem
    {
        return new self($item->getBuyableIdentifier($options),
            $item->getBuyableDescription($options), $item->getBuyablePrice($options),
            $options);
    }

    /**
     * Create a new instance from the given array.
     *
     * @param array $attributes
     * @return CartItem
     */
    public static function fromArray(array $attributes): CartItem
    {
        $options = array_get($attributes, 'options', []);

        return new self($attributes['id'], $attributes['name'], $attributes['price'], $options);
    }

    /**
     * Create a new instance from the given attributes.
     *
     * @param $id
     * @param $name
     * @param $price
     * @param array $options
     * @return CartItem
     */
    public static function fromAttributes($id, $name, $price, array $options = []): CartItem
    {
        return new self($id, $name, $price, $options);
    }

    /**
     * Generate a unique id for the cart item.
     *
     * @param string $id
     * @param array  $options
     * @return string
     */
    protected function generateRowId($id, array $options): string
    {
        ksort($options);

        return md5($id . serialize($options));
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'rowId'    => $this->rowId,
            'id'       => $this->id,
            'userId'     => \Auth::check() ? \Auth::user()->id : null,
            'name'     => $this->name,
            'qty'      => $this->qty,
            'price'    => $this->price,
            'options'  => $this->options,
            'tax'      => $this->tax,
            'subtotal' => $this->subtotal
        ];
    }
}