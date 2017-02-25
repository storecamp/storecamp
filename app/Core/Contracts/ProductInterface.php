<?php

namespace app\Core\Contracts;


use App\Core\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface ProductInterface
{
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array;
    /**
     * bootable methods fix
     */
    public static function boot();

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReview(): HasMany;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributeGroupDescription(): BelongsToMany;

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null);

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null);

    /**
     * @param null $options
     * @return float
     */
    public function getBuyablePrice($options = null);

    /**
     * @return string
     */
    public function getAvailability(): string;

    /**
     * @return mixed
     */
    public function getStockStatus(): string;

    /**
     * get the product category
     *
     * @return mixed
     */
    public function getFirstCategory(): Category;
    /**
     * @param $stock_status
     */
    public function setStockStatusAttribute($stock_status);

    /**
     * @param int|float $length
     */
    public function setLengthAttribute($length);

    /**
     * @param int|float $width
     */
    public function setWidthAttribute($width);

    /**
     * @param int|float $height
     */
    public function setHeightAttribute($height);

    /**
     * @param int|float $weight
     */
    public function setWeightAttribute($weight);

    /**
     * @param $date
     */
    public function setDateAvailableAttribute($date);

    /**
     * @param $quantity
     */
    public function setQuantityAttribute($quantity);

    /**
     * @param $sort_order
     */
    public function setSortOrderAttribute($sort_order);

    /**
     * @param $query
     */
    public function scopeUnpublished($query);

    /**
     * @param $query
     */
    public function scopePublished($query);
    /**
     * @param $query
     * @return mixed
     */
    public function scopeNewest($query);

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDrafted($query);

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeBySlugOrId($query, $id);

    /**
     * get all products
     * by the given category
     *
     * @param $query
     * @param Category|null $category
     * @return mixed
     */
    public function scopeCategorized($query, $category = null);
}