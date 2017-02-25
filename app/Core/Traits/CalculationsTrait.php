<?php

namespace App\Core\Traits;


trait CalculationsTrait
{
    /**
     * Property used to stored calculations.
     * @var array
     */
    private $shopCalculations = null;
    /**
     * Returns total amount of items in cart.
     *
     * @return int
     */
    public function getCountAttribute(): int
    {
        if (empty($this->shopCalculations)) $this->runCalculations();
        return round($this->shopCalculations->itemCount, 2);
    }
    /**
     * Returns total price of all the items in cart.
     *
     * @return float
     */
    public function getTotalPriceAttribute(): float
    {
        if (empty($this->shopCalculations)) $this->runCalculations();
        return round($this->shopCalculations->totalPrice, 2);
    }
    /**
     * Returns total tax of all the items in cart.
     *
     * @return float
     */
    public function getTotalTaxAttribute(): float
    {
        if (empty($this->shopCalculations)) $this->runCalculations();
        return round($this->shopCalculations->totalTax + ($this->totalPrice * config('shop.tax')), 2);
    }
    /**
     * Returns total tax of all the items in cart.
     *
     * @return float
     */
    public function getTotalShippingAttribute(): float
    {
        if (empty($this->shopCalculations)) $this->runCalculations();
        return round($this->shopCalculations->totalShipping, 2);
    }
    /**
     * Returns total discount amount based on all coupons applied.
     *
     * @return float
     */
    public function getTotalDiscountAttribute(): float { /* TODO */ }
    /**
     * Returns total amount to be charged base on total price, tax and discount.
     *
     * @return float
     */
    public function getTotalAttribute(): float
    {
        if (empty($this->shopCalculations)) $this->runCalculations();
        return $this->totalPrice + $this->totalTax + $this->totalShipping;
    }
    /**
     * Returns formatted total price of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalPriceAttribute(): string
    {
        return shopFormat($this->totalPrice);
    }
    /**
     * Returns formatted total tax of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalTaxAttribute(): string
    {
        return shopFormat($this->totalTax);
    }
    /**
     * Returns formatted total tax of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalShippingAttribute(): string
    {
        return shopFormat($this->totalShipping);
    }
    /**
     * Returns formatted total discount amount based on all coupons applied.
     *
     * @return string
     */
    public function getDisplayTotalDiscountAttribute(): string { /* TODO */ }
    /**
     * Returns formatted total amount to be charged base on total price, tax and discount.
     *
     * @return string
     */
    public function getDisplayTotalAttribute(): string
    {
        return shopFormat($this->total);
    }

    /**
     * Returns cache key used to store calculations.
     *
     * @return string.
     */
    public function getCalculationsCacheKeyAttribute(): string
    {
        return 'shop_' . $this->table . '_' . $this->attributes['id'] . '_calculations';
    }

    /**
     * Runs calculations.
     */
    private function runCalculations()
    {
        if (!empty($this->shopCalculations)) return $this->shopCalculations;
        $cacheKey = $this->calculationsCacheKey;
        if (config('shop.cache_calculations')
            && \Cache::has($cacheKey)
        ) {
            $this->shopCalculations = \Cache::get($cacheKey);
            return $this->shopCalculations;
        }
        $this->shopCalculations = \DB::table($this->table)
            ->select([
                \DB::raw('sum(' . config('shop.item_table') . '.quantity) as itemCount'),
                \DB::raw('sum(' . config('shop.item_table') . '.price * ' . config('shop.item_table') . '.quantity) as totalPrice'),
                \DB::raw('sum(' . config('shop.item_table') . '.tax * ' . config('shop.item_table') . '.quantity) as totalTax'),
                \DB::raw('sum(' . config('shop.item_table') . '.shipping * ' . config('shop.item_table') . '.quantity) as totalShipping')
            ])
            ->join(
                config('shop.item_table'),
                config('shop.item_table') . '.' . ($this->table == config('shop.order_table') ? 'order_id' : $this->table . '_id'),
                '=',
                $this->table . '.id'
            )
            ->where($this->table . '.id', $this->attributes['id'])
            ->first();
        if (config('shop.cache_calculations')) {
            \Cache::put(
                $cacheKey,
                $this->shopCalculations,
                config('shop.cache_calculations_minutes')
            );
        }
        return $this->shopCalculations;
    }
    /**
     * Resets cart calculations.
     */
    private function resetCalculations ()
    {
        $this->shopCalculations = null;
        if (config('shop.cache_calculations')) {
            \Cache::forget($this->calculationsCacheKey);
        }
    }
}