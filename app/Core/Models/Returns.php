<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Returns.
 *
 * @mixin \Eloquent
 */
class Returns extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $fillable = [];

    public static function boot()
    {
        parent::boot();
    }
}
