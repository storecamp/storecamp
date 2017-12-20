<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Plank\Mediable\Mediable;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Pages.
 *
 * @property int $id
 * @property string $unique_id
 * @property int $author_id
 * @property string $title
 * @property string|null $excerpt
 * @property string|null $body
 * @property string $slug
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Pages withMediaMatchAll($tags = array())
 * @mixin \Eloquent
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
