<?php

namespace App\Core\Models;

use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Counter.
 *
 * @property string $unique_id
 * @property int $id
 * @property string $class_name
 * @property int $object_id
 * @property int $view_counter
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereClassName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Counter whereViewCounter($value)
 * @mixin \Eloquent
 */
class Counter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $table = 'counter';
    protected $fillable = ['class_name', 'object_id'];

    public static function boot()
    {
        parent::boot();
    }
}
