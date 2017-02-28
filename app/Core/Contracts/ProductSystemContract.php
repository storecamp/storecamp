<?php

namespace App\Core\Contracts;

/**
 * Interface ProductSystemContract.
 */
interface ProductSystemContract extends BaseLogicContract
{
    public function categorized(array $data, $category, array $with = []);
}
