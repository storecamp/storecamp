<?php

namespace App\Core\Contracts;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface OrderInterface
{

    /**
     * One-to-One relations with the user model.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo;

    /**
     * One-to-Many relations with Item.
     *
     * @return HasMany
     */
    public function transactions(): HasMany;
    /**
     * Returns flag indicating if order is lock and cant be modified by the user.
     * An order is locked the moment it enters pending status.
     *
     * @return bool
     */
    public function getIsLockedAttribute(): bool;
    /**
     * Scopes class by user ID and returns object.
     * Optionally, scopes by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query      Query.
     * @param mixed                                 $userId     User ID.
     * @param string                                $statusCode Status.
     *
     * @return Builder
     */
    public function scopeFindByUser($query, $userId, $statusCode = null): Builder;
    /**
     * Returns total amount of items in cart.
     *
     * @return int
     */
    public function getCountAttribute(): int;
    /**
     * Returns total price of all the items in cart.
     *
     * @return float
     */
    public function getTotalPriceAttribute(): float;
    /**
     * Returns total tax of all the items in cart.
     *
     * @return float
     */
    public function getTotalTaxAttribute(): float;
    /**
     * Returns total tax of all the items in cart.
     *
     * @return float
     */
    public function getTotalShippingAttribute(): float;
    /**
     * Returns total discount amount based on all coupons applied.
     *
     * @return float
     */
    public function getTotalDiscountAttribute(): float;
    /**
     * Returns total amount to be charged base on total price, tax and discount.
     *
     * @return float
     */
    public function getTotalAttribute(): float;
    /**
     * Returns formatted total price of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalPriceAttribute(): string;
    /**
     * Returns formatted total tax of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalTaxAttribute(): string;
    /**
     * Returns formatted total tax of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalShippingAttribute(): string;
    /**
     * Returns formatted total discount amount based on all coupons applied.
     *
     * @return string
     */
    public function getDisplayTotalDiscountAttribute(): string;
    /**
     * Returns formatted total amount to be charged base on total price, tax and discount.
     *
     * @return string
     */
    public function getDisplayTotalAttribute(): string;

    /**
     * Returns flag indicating if order is in the status specified.
     *
     * @param string $statusCode
     * @return bool
     */
    public function isStatus(string $statusCode): bool;
    /**
     * Creates the order's transaction.
     *
     * @param string $gateway       Gateway.
     * @param mixed  $transactionId Transaction ID.
     * @param string $detail        Transaction detail.
     *
     * @return object
     */
    public function placeTransaction(string $gateway, $transactionId, string $detail = '');
    /**
     * Scopes class by item sku.
     * Optionally, scopes by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query  Query.
     * @param mixed                                 $sku    Item SKU.
     *
     * @return Builder
     */
    public function scopeWhereSKU($query, $sku): Builder;
    /**
     * Scopes class by status codes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query       Query.
     * @param array                                 $statusCodes Status.
     *
     * @return Builder
     */
    public function scopeWhereStatusIn($query, array $statusCodes): Builder;

}