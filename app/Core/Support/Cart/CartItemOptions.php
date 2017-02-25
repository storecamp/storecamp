<?php

namespace App\Core\Support\Cart;

use Illuminate\Support\Collection;

class CartItemOptions extends Collection
{
    /**
     * Get the option by the given key.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        $option = $this->get($key);
        return $option;
    }
}