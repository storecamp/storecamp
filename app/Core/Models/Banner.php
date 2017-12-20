<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Banner.
 *
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Banner idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Banner uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 */
class Banner extends Model implements Transformable
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
