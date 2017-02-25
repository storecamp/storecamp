<?php

namespace App\Core\Support\Cart;


use App\Core\Contracts\Buyable;

interface CartItemContract
{
    /**
     * Returns the formatted price without TAX.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function price($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Returns the formatted price with TAX.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function priceTax($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Returns the formatted subtotal.
     * Subtotal is price for whole CartItem without TAX
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function subtotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Returns the formatted total.
     * Total is price for whole CartItem with TAX
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function total($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Returns the formatted tax.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function tax($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Returns the formatted tax.
     *
     * @param int    $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function taxTotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Set the quantity for this cart item.
     *
     * @param int|float $qty
     */
    public function setQuantity($qty);

    /**
     * Update the cart item from a Buyable.
     *
     * @param Buyable $item
     */
    public function updateFromBuyable(Buyable $item);

    /**
     * Update the cart item from an array.
     *
     * @param array $attributes
     * @return void
     */
    public function updateFromArray(array $attributes);

    /**
     * Associate the cart item with the given model.
     *
     * @param $model
     * @return CartItem
     */
    public function associate($model): CartItem;

    /**
     * Set the tax rate.
     *
     * @param $taxRate
     * @return CartItem
     */
    public function setTaxRate($taxRate): CartItem;

    /**
     * Create a new instance from a Buyable.
     *
     * @param Buyable $item
     * @param array $options
     * @return CartItem
     */
    public static function fromBuyable($item, array $options = []): CartItem;

    /**
     * Create a new instance from the given array.
     *
     * @param array $attributes
     * @return CartItem
     */
    public static function fromArray(array $attributes): CartItem;

    /**
     * Create a new instance from the given attributes.
     *
     * @param $id
     * @param $name
     * @param $price
     * @param array $options
     * @return CartItem
     */
    public static function fromAttributes($id, $name, $price, array $options = []): CartItem;

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array;
}