<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Contracts\CartInterface;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Cart.
 *
 * @property int $id
 * @property string $unique_id
 * @property int $user_id
 * @property int $order_id
 * @property string $instance
 * @property array $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereInstance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model implements Transformable, CartInterface
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $table;
    protected $casts = [
        'content' => 'array',
    ];
    protected $fillable = ['instance', 'content'];

    /**
     * Cart constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('sales.cart_table');
    }

    public static function boot()
    {
        parent::boot();
    }
}
