<?php 

namespace App\Core\APIs\Youtube\Facades;

use Illuminate\Support\Facades\Facade;

class Youtube extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'App\Core\APIs\Youtube\Youtube';
    }

}