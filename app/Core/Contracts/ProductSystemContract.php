<?php

namespace App\Core\Contracts;


use App\Core\Models\Product;

/**
 * Interface ProductSystemContract
 * @package App\Core\Contracts
 */
interface ProductSystemContract extends BaseLogicContract
{
    public function categorized(array $data, $category, array $with = []);
}