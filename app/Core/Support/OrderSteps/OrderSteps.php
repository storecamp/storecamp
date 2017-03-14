<?php

namespace App\Core\Support\OrderSteps;

use Illuminate\Support\Collection;

class OrderSteps extends Collection
{
    const STEPS = [
        'showPersonal', 'showAddress', 'showShipping', 'showPayment'
    ];

    /**
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public function __get(string $key)
    {
        if (in_array($key, self::STEPS))
        {
            $option = $this->get($key);

            return $option;
        } else {
            throw  new  \Exception("Step not found");
        }
    }
}