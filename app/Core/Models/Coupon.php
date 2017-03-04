<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Contracts\CouponInterface;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Support\Nestedset\QueryBuilder;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Coupon.
 *
 * @property int $id
 * @property string $unique_id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $sku
 * @property float $value
 * @property float $discount
 * @property int $active
 * @property string $expires_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon findByCode($code)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereExpiresAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereSku($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Coupon whereValue($value)
 * @mixin \Eloquent
 */
class Coupon extends Model implements Transformable, CouponInterface
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = ['code', 'sku', 'value', 'discount', 'name', 'description', 'expires_at'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('shop.coupon_table');
    }

    /**
     * perform some actions on model boot.
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * Scopes class by coupon code.
     *
     * @return QueryBuilder
     */
    public function scopeWhereCode($query, $code)
    {
        return $query->where('code', $code);
    }

    /**
     * Scopes class by coupen code and returns object.
     *
     * @return $this
     */
    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', $code)->first();
    }
}
