<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Contracts\TransactionInterface;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

class Transaction extends Model implements Transformable, TransactionInterface
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $fillable = [];

    public static function boot()
    {
        parent::boot();
    }

    /**
     * One-to-One relations with the order model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(config('shop.order_table'), 'order_id');
    }

    /**
     * Scopes to get transactions from user.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereUser($query, $userId)
    {
        return $query->join(
            config('shop.order_table'),
            config('shop.order_table').'.id',
            '=',
            config('shop.transaction_table').'.order_id'
        )
            ->where(config('shop.order_table').'.user_id', $userId);
    }
}
