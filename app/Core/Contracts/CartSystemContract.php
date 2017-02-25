<?php

namespace App\Core\Contracts;


use App\Core\Support\Cart\CartItem;
use Illuminate\Support\Collection;

/**
 * Interface CartSystemContract
 * @package app\Core\Contracts
 */
interface CartSystemContract
{
    /**
     * @param array $data
     * @param bool $withAggregations
     * @return mixed
     */
    public function show(array $data, bool $withAggregations=true);

    /**
     * @param array $data
     * @param $productId
     * @return mixed
     */
    public function addItem(array $data, $productId);
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
    public function add($id, $name = null, $qty = null, $price = null, array $options = []);

    /**
     * Update the cart item with the given rowId.
     *
     * @param $rowId
     * @param $qty
     * @return CartItem|void
     */
    public function update($rowId, $qty);

    /**
     * Remove the cart item with the given rowId from the cart.
     *
     * @param string $rowId
     * @return void
     */
    public function remove($rowId);

    /**
     * Get a cart item from the cart by its rowId.
     *
     * @param string $rowId
     * @return CartItem
     */
    public function find($rowId);

    /**
     * Destroy the current cart instance.
     *
     * @return void
     */
    public function destroy();

    /**
     * Get the content of the cart.
     *
     * @return \Illuminate\Support\Collection
     */
    public function content(): Collection;

    /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
    public function count();

    /**
     * Get the total price of the items in the cart.
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return string
     */
    public function total($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Get the total tax of the items in the cart.
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return float
     */
    public function tax($decimals = null, $decimalPoint = null, $thousandSeperator = null): float;

    /**
     * Get the subtotal (total - tax) of the items in the cart.
     *
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandSeperator
     * @return float|string
     */
    public function subtotal($decimals = null, $decimalPoint = null, $thousandSeperator = null): string;

    /**
     * Search the cart content for a cart item matching the given search closure.
     *
     * @param \Closure $search
     * @return Collection
     */
    public function search(\Closure $search): Collection;

    /**
     * Associate the cart item with the given rowId with the given model.
     *
     * @param string $rowId
     * @param mixed $model
     * @return void
     */
    public function associate($rowId, $model);

    /**
     * Set the tax rate for the cart item with the given rowId.
     *
     * @param string $rowId
     * @param int|float $taxRate
     * @return void
     */
    public function setTax($rowId, $taxRate);

    /**
     * Store an the current instance of the cart.
     *
     * @param mixed $identifier
     * @return void
     */
    public function store($identifier);

    /**
     * Restore the cart with the given identifier.
     *
     * @param mixed $identifier
     * @return void
     */
    public function restore($identifier);
}