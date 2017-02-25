<?php

namespace App\Core\Contracts;

/**
 * This file is part of LaravelShop,
 * A shop solution for Laravel.
 *
 * @author Alejandro Mostajo
 * @copyright Amsgames, LLC
 * @license MIT
 * @package App\Core
 */

interface CouponInterface
{

    /**
     * Scopes class by coupon code.
     *
     * @return QueryBuilder
     */
    public function scopeWhereCode($query, $code);

    /**
     * Scopes class by coupen code and returns object.
     *
     * @return this
     */
    public function scopeFindByCode($query, $code);

}