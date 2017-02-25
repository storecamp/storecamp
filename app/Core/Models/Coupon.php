<?php

namespace App\Core\Models;

use App\Core\Support\Nestedset\QueryBuilder;
use App\Core\Contracts\CouponInterface;
use Illuminate\Database\Eloquent\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Coupon extends Model implements Transformable, CouponInterface
{
    use TransformableTrait;
    use GeneratesUnique;

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
     * perform some actions on model boot
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
