<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Plank\Mediable\Mediable;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Pages
 * @package App\Core\Models
 */
class Pages extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;
    use Mediable;

    /**
     * Statuses.
     */
    const STATUS_ACTIVE = 'ACTIVE';
    /**
     *
     */
    const STATUS_INACTIVE = 'INACTIVE';

    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    protected $fillable = ['title', 'excerpt', 'body', 'meta_description', 'meta_keywords', 'status'];

    public static function boot()
    {
       parent::boot();
    }

    /**
     * @param $authorId
     */
    public function setAuthorIdAttribute($authorId)
    {
        if ($authorId) {
            $this->author_id = $authorId;
        } else {
            $this->author_id = \Auth::user()->id;
        }
    }

    /**
     * Scope a query to only include active pages.
     *
     * @param  $query  \Illuminate\Database\Eloquent\Builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', static::STATUS_ACTIVE);
    }
}
