<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Arcanedev\Support\Collection;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Plank\Mediable\Mediable;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Category.
 *
 * @property int $id
 * @property string $unique_id
 * @property int $parent_id
 * @property string $name
 * @property string $description
 * @property string $image_link
 * @property string $slug
 * @property string $meta_tag_title
 * @property string $meta_tag_description
 * @property string $meta_tag_keywords
 * @property bool $status
 * @property bool $top
 * @property bool $sort_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Product[] $products
 * @property-read \App\Core\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Category[] $children
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereImageLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereMetaTagTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereMetaTagDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereMetaTagKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereTop($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereSortOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category options()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property int $_lft
 * @property int $_rgt
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Media[] $media
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category d()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category onlyParent()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category withMediaMatchAll($tags = array())
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Category uuid($unique_id, $first = true)
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use \Cviebrock\EloquentSluggable\Sluggable;
    use SluggableScopeHelpers;
    use Auditable;
    use Mediable;
    use CacheableEloquent {
        CacheableEloquent::newEloquentBuilder as cache_newEloquentBuilder;
    }

    public function newEloquentBuilder($query)
    {
        return $this->cache_newEloquentBuilder($query);
    }

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_link',
        'parent_id',
        'status',
        'top',
        'sort_order',
        'meta_tag_title',
        'meta_tag_description',
        'meta_tag_keywords',
    ];

    /**
     * @var array
     */
    protected $appends = ['type'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * bootable methods fix.
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeOptions($query)
    {
        return $query->pluck('name', 'id');
    }

    /**
     * @return string
     */
    public function getTypeAttribute()
    {
        if (!$this->parent_id) {
            return $this->attributes['type'] = 'parent';
        } else {
            return $this->attributes['type'] = 'child';
        }
    }

    /**
     * @param $data
     *
     * @return string
     */
    public function setTypeAttribute($data)
    {
        if (!$this->parent_id) {
            return $this->attributes['type'] = 'parent';
        } else {
            return $this->attributes['type'] = 'child';
        }
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        if ($this->parent_id) {
            return 'child';
        } else {
            return 'parent';
        }
    }

    /**
     * @param $type
     *
     * @return bool
     */
    public function isType($type) : bool
    {
        if ($this->parent_id) {
            return 'child' == $type;
        } else {
            return 'parent' == $type;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Core\Models\Category', 'parent_id');
    }


    /**
     * @param array $parents
     * @param null $parent
     * @return array|int
     */
    public function parents($parents = array(), $parent = null)
    {
        if(!$parent) {
            $parent = $this;
        }

        while ($parent->parent_id != null) {
            array_push($parents, $parent->parent);
            return $this->parents($parents, $parent->parent);
        }

        return $parents;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Core\Models\Category', 'parent_id');
    }

    /**
     * @param null $category
     * @param array $categories
     * @return Collection
     */
    public function descedants($category = null, $categories = array())
    {
        if(is_null($category)) {
           $category = $this;
        }
        if(count($category->children)) {
            foreach ($category->children as $child) {
                array_push($categories, $child);
                if($child->children->count()) {
                    return $this->descedants($child, $categories);
                }
            }
        }

       return new Collection($categories);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeOnlyParent($query)
    {
        return $query->where('parent_id', '=', null);
    }
}
