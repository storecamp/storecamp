<?php

namespace App\Core\Models;

use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Like.
 *
 * @property int $id
 * @property string $unique_id
 * @property int $likeable_id
 * @property string $likeable_type
 * @property int $liked_by_id
 * @property string $liked_by_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $likeable
 * @property-write mixed $value
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereLikeableId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereLikeableType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereLikedById($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereLikedByType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Like whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Like extends Model implements Transformable
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
    protected $table = 'likes';

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

    /**
     * @param Model $likeable
     *
     * @return mixed
     */
    public static function count(Model $likeable)
    {
        return $likeable->likes()
            ->count();
    }

    /**
     * @param Model $likeable
     * @param $from
     * @param null $to
     *
     * @return mixed
     */
    public static function countByDate(Model $likeable, $from, $to = null)
    {
        $query = $likeable->likes();

        if (!empty($to)) {
            $range = [new Carbon($from), new Carbon($to)];
        } else {
            $range = [
                (new Carbon($from))->startOfDay(),
                (new Carbon($to))->endOfDay(),
            ];
        }

        return $query->whereBetween('created_at', $range)
            ->count();
    }

    /**
     * @param Model $likeable
     *
     * @return mixed
     */
    public static function like(Model $likeable)
    {
        return (new static())->cast($likeable, 1);
    }

    /**
     * @param Model $likeable
     *
     * @return mixed
     */
    public static function dislike(Model $likeable)
    {
        return (new static())->cast($likeable, -1);
    }

    /**
     * @param $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = ($value == -1) ? -1 : 1;
    }

    /**
     * @param Model $likeable
     * @param int   $value
     *
     * @return bool
     */
    protected function cast(Model $likeable, $value = 1)
    {
        if (!$likeable->exists) {
            return false;
        }

        $vote = new static();
        $vote->fill(compact('value'));

        return $vote->likeable()
            ->associate($likeable)
            ->save();
    }
}
