<?php

namespace App\Core\Traits;

trait CalculationsTrait
{
    /**
     * Property used to stored calculations.
     * @var array
     */
    private $salesCalculations = null;

    /**
     * Returns total amount of items in cart.
     *
     * @return int
     */
    public function getCountAttribute(): int
    {
        if (empty($this->salesCalculations)) {
            $this->runCalculations();
        }

        return round($this->salesCalculations->itemCount, 2);
    }

    /**
     * Returns total price of all the items in cart.
     *
     * @return float
     */
    public function getTotalPriceAttribute(): float
    {
        if (empty($this->salesCalculations)) {
            $this->runCalculations();
        }

        return round($this->salesCalculations->totalPrice, 2);
    }

    /**
     * Returns total tax of all the items in cart.
     *
     * @return float
     */
    public function getTotalTaxAttribute(): float
    {
        if (empty($this->salesCalculations)) {
            $this->runCalculations();
        }

        return round($this->salesCalculations->totalTax + ($this->totalPrice * config('sales.tax')), 2);
    }

    /**
     * Returns total tax of all the items in cart.
     *
     * @return float
     */
    public function getTotalShippingAttribute(): float
    {
        if (empty($this->salesCalculations)) {
            $this->runCalculations();
        }

        return round($this->salesCalculations->totalShipping, 2);
    }

    /**
     * Returns total discount amount based on all coupons applied.
     *
     * @return float
     */
    public function getTotalDiscountAttribute(): float
    { /* TODO */
    }

    /**
     * Returns total amount to be charged base on total price, tax and discount.
     *
     * @return float
     */
    public function getTotalAttribute(): float
    {
        if (empty($this->salesCalculations)) {
            $this->runCalculations();
        }

        return $this->totalPrice + $this->totalTax + $this->totalShipping;
    }

    /**
     * Returns formatted total price of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalPriceAttribute(): string
    {
        return salesFormat($this->totalPrice);
    }

    /**
     * Returns formatted total tax of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalTaxAttribute(): string
    {
        return salesFormat($this->totalTax);
    }

    /**
     * Returns formatted total tax of all the items in cart.
     *
     * @return string
     */
    public function getDisplayTotalShippingAttribute(): string
    {
        return salesFormat($this->totalShipping);
    }

    /**
     * Returns formatted total discount amount based on all coupons applied.
     *
     * @return string
     */
    public function getDisplayTotalDiscountAttribute(): string
    { /* TODO */
    }

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
        return 'sales_'.$this->table.'_'.$this->attributes['id'].'_calculations';
    }

    /**
     * Runs calculations.
     */
    private function runCalculations()
    {
        if (! empty($this->salesCalculations)) {
            return $this->salesCalculations;
        }
        $cacheKey = $this->calculationsCacheKey;
        if (config('sales.cache_calculations')
            && \Cache::has($cacheKey)
        ) {
            $this->salesCalculations = \Cache::get($cacheKey);

            return $this->salesCalculations;
        }
        $this->salesCalculations = \DB::table($this->table)
            ->select([
                \DB::raw('sum('.config('sales.item_table').'.quantity) as itemCount'),
                \DB::raw('sum('.config('sales.item_table').'.price * '.config('sales.item_table').'.quantity) as totalPrice'),
                \DB::raw('sum('.config('sales.item_table').'.tax * '.config('sales.item_table').'.quantity) as totalTax'),
                \DB::raw('sum('.config('sales.item_table').'.shipping * '.config('sales.item_table').'.quantity) as totalShipping'),
            ])
            ->join(
                config('sales.item_table'),
                config('sales.item_table').'.'.($this->table == config('sales.order_table') ? 'order_id' : $this->table.'_id'),
                '=',
                $this->table.'.id'
            )
            ->where($this->table.'.id', $this->attributes['id'])
            ->first();
        if (config('sales.cache_calculations')) {
            \Cache::put(
                $cacheKey,
                $this->salesCalculations,
                config('sales.cache_calculations_minutes')
            );
        }

        return $this->salesCalculations;
    }

    /**
     * Resets cart calculations.
     */
    private function resetCalculations()
    {
        $this->salesCalculations = null;
        if (config('sales.cache_calculations')) {
            \Cache::forget($this->calculationsCacheKey);
        }
    }

    /**
     * @return float|int
     */
    public function getAvgRatingCounter()
    {
        $reviews = $this->productReview()->select('rating')->pluck('rating')->toArray();
        if (! empty($reviews)) {
            return round(array_sum($reviews) / (count($reviews)), 1);
        } else {
            return $reviews;
        }
    }

    /**
     * @return float|int
     */
    public function getRatingCounter()
    {
        $reviews = $this->productReview()->select('rating')->pluck('rating')->toArray();
        if (! empty($reviews)) {
            return count($reviews);
        } else {
            return 0;
        }
    }
}
