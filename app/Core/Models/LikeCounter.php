<?php

namespace App\Core\Models;

use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\LikeCounter.
 *
 * @property int $id
 * @property int $likeable_id
 * @property string $likeable_type
 * @property string $unique_id
 * @property int $count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $likeable
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereLikeableId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereLikeableType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\LikeCounter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LikeCounter extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    public static function boot()
    {
        parent::boot();
    }

    /**
     * @var string
     */
    protected $table = 'likes_counter';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function likeable()
    {
        return $this->morphTo();
    }
}
