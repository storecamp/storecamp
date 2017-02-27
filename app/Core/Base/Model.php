<?php

namespace App\Core\Base;

use App\Core\Support\Cacheable\CacheableEloquent;
use  Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    use CacheableEloquent;
}