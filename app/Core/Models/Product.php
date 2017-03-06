<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Contracts\Buyable;
use App\Core\Contracts\ProductInterface;
use App\Core\Repositories\CategoryRepository;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\CartItemTrait;
use App\Core\Traits\GeneratesUnique;
use App\Core\Traits\Likeable;
use App\Core\Traits\ProductCalculations;
use App\Core\Traits\ViewCounterTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Plank\Mediable\Mediable;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Product.
 *
 * @property int $id
 * @property string $unique_id
 * @property string $title
 * @property string $body
 * @property string $model
 * @property string $slug
 * @property string $stock_status
 * @property int $viewed
 * @property int $quantity
 * @property string $sku
 * @property string $upc
 * @property string $ean
 * @property string $jan
 * @property string $isbn
 * @property string $mpn
 * @property float $price
 * @property float $length
 * @property float $width
 * @property float $height
 * @property float $weight
 * @property \Carbon\Carbon $date_available
 * @property bool $availability
 * @property string $meta_tag_title
 * @property string $meta_tag_description
 * @property string $meta_tag_keywords
 * @property bool $sort_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Core\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\ProductReview[] $reviews
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\AttributeGroupDescription[] $attributeGroupDescription
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereModel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereStockStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereViewed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereSku($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereUpc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereEan($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereJan($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereIsbn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereMpn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereLength($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereDateAvailable($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereAvailability($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereMetaTagTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereMetaTagDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereMetaTagKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereSortOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product unpublished()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product published()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product newest()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product drafted()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product bySlugOrId($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product categorized($category = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Media[] $media
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product withMediaMatchAll($tags = array())
 * @property float $tax
 * @property string $brand_name
 * @property-read string $display_name
 * @property-read string $display_price
 * @property-read string $display_shipping
 * @property-read string $display_tax
 * @property-read bool $has_object
 * @property-read bool $is_shoppable
 * @property-read int|null $like_count
 * @property-read mixed $object
 * @property-read mixed $shop_id
 * @property-read string $shop_url
 * @property-read bool $was_purchased
 * @property-read \App\Core\Models\LikeCounter $likeCounter
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Like[] $likes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\UserCounter[] $user_counters
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product findBySKU($sku)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product mostViewed($limit)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereBrandName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereLiked($model)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Product whereTax($value)
 */
class Product extends Model implements Transformable, Buyable, ProductInterface
{
    use TransformableTrait;
    use \Cviebrock\EloquentSluggable\Sluggable;
    use GeneratesUnique;
    use Auditable;
    use Mediable;
    use CartItemTrait;
    use CacheableEloquent;
    use ViewCounterTrait;
    use Likeable;
    use ProductCalculations;

    /**
     * Custom field name to define the item's name.
     * @var string
     */
    protected $itemName = 'title';
    /**
     * @var array
     */
    protected $itemRouteParams = ['unique_id'];

    /**
     * @var array
     */
    protected $fillable = [
        'slug',
        'model',
        'title',
        'body',
        'price',
        'availability',
        'date_available',
        'model',
        'quantity',
        'viewed',
        'sku',
        'upc',
        'ean',
        'jan',
        'isbn',
        'mpn',
        'tax',
        'length',
        'width',
        'height',
        'weight',
        'meta_tag_title',
        'meta_tag_description',
        'meta_tag_keywords',
        'sort_order',
        'stock_status',
        'attr_description_id',
        'product_id',
        'value',
        'brand_name',
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('sales.product_table');
    }

    /**
     * @var array
     */
    protected $dates = ['date_available'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReview(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributeGroupDescription(): BelongsToMany
    {
        return $this->belongsToMany(AttributeGroupDescription::class,
            'product_attribute', 'product_id', 'attr_description_id')
            ->withPivot('value');
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->unique_id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->title;
    }

    /**
     * @param null $options
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getAvailability(): string
    {
        if ($this->availability) {
            return 'enabled';
        } else {
            return 'disabled';
        }
    }

    /**
     * @return mixed
     */
    public function getStockStatus(): string
    {
        return config('constants.stock-statuses.'.$this->stock_status);
    }

    /**
     * get the product category.
     *
     * @return mixed
     */
    public function getFirstCategory(): Category
    {
        return $this->categories()->first();
    }

    /**
     * @param $stock_status
     */
    public function setStockStatusAttribute($stock_status)
    {
        if (! $stock_status) {
            $this->attributes['stock_status'] = 0;
        } else {
            $this->attributes['stock_status'] = $stock_status;
        }
    }

    /**
     * @param int|float $length
     */
    public function setLengthAttribute($length)
    {
        if (! $length) {
            $this->attributes['length'] = 0.00000000;
        } else {
            $this->attributes['length'] = $length;
        }
    }

    /**
     * @param int|float $width
     */
    public function setWidthAttribute($width)
    {
        if (! $width) {
            $this->attributes['width'] = 0.00000000;
        } else {
            $this->attributes['width'] = $width;
        }
    }

    /**
     * @param int|float $height
     */
    public function setHeightAttribute($height)
    {
        if (! $height) {
            $this->attributes['height'] = 0.00000000;
        } else {
            $this->attributes['height'] = $height;
        }
    }

    /**
     * @param int|float $weight
     */
    public function setWeightAttribute($weight)
    {
        if (! $weight) {
            $this->attributes['weight'] = 0.0000;
        } else {
            $this->attributes['weight'] = $weight;
        }
    }

    /**
     * @param $date
     */
    public function setDateAvailableAttribute($date)
    {
        if (! $date) {
            $this->attributes['date_available'] = Carbon::now();
        } else {
            $this->attributes['date_available'] = $date;
        }
    }

    /**
     * @param $quantity
     */
    public function setQuantityAttribute($quantity)
    {
        if ($quantity) {
            $this->attributes['quantity'] = intval($quantity);
        } else {
            $this->attributes['quantity'] = 0;
        }
    }

    /**
     * @param $sort_order
     */
    public function setSortOrderAttribute($sort_order)
    {
        if ($sort_order) {
            $this->attributes['sort_order'] = intval($sort_order);
        } else {
            $this->attributes['sort_order'] = 0;
        }
    }

    /**
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('date_available', '>', Carbon::now());
    }

    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('date_available', '<=', Carbon::now());
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDrafted($query)
    {
        return $query->where('published_at', '!=', null);
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeBySlugOrId($query, $id)
    {
        return $query->where($id)->orWhere('slug', '=', $id);
    }

    /**
     * get all products
     * by the given category.
     *
     * @param $query
     * @param Category|null $category
     * @return mixed
     */
    public function scopeCategorized($query, $category = null)
    {
        if (is_null($category)) {
            return $query->with('categories');
        }
        $categoryInstance = app(CategoryRepository::class);
        $category = $categoryInstance->findOrFail($category);
        $categoryIds = $category->getDescendants(['id'])->pluck('id')->toArray();
        array_unshift($categoryIds, $category->id);

        return $query->with('categories')
            ->join('products_categories', 'products_categories.product_id', '=', 'products.id')
            ->whereIn('products_categories.category_id', $categoryIds);
    }

}
