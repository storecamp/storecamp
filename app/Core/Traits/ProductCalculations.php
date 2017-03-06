<?php

namespace App\Core\Traits;


trait ProductCalculations
{
    /**
     * @return float|int
     */
    public function getAvgRating()
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
        $reviewsCount = $this->productReview()->count();
        return $reviewsCount;
    }
}