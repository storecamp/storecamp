<?php

namespace App\Core\Components\Auditing\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see App\Core\Components\Auditing\Auditing
 */
class Auditing extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Core\Components\Auditing\Auditing';
    }
}
