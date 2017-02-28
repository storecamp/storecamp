<?php

namespace App\Core\Access;

/*
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package App\Core\Access
 */

use Illuminate\Support\Facades\Facade;

class AccessFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'access';
    }
}
