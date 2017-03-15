<?php

namespace App\Core\Models;

use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\UserCounter.
 *
 * @property string $unique_id
 * @property int $id
 * @property string $class_name
 * @property int $object_id
 * @property int $user_id
 * @property string $action
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereClassName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\UserCounter whereUserId($value)
 * @mixin \Eloquent
 */
class UserCounter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;

    protected $table = 'user_counter';
    protected $fillable = ['class_name', 'object_id', 'user_id', 'action'];

    public static function boot()
    {
        parent::boot();
    }
}
