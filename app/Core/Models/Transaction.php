<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Contracts\TransactionInterface;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Transaction
 *
 * @property int $id
 * @property string $unique_id
 * @property int $order_id
 * @property string $gateway
 * @property string $transaction_id
 * @property string $detail
 * @property string $token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Core\Models\Orders $order
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereDetail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereGateway($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereTransactionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Transaction whereUser($userId)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo(config('sales.order'), 'order_id');
    }

    /**
     * Scopes to get transactions from user.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereUser($query, $userId)
    {
        return $query->join(
            config('sales.order_table'),
            config('sales.order_table').'.id',
            '=',
            config('sales.transaction_table').'.order_id'
        )
            ->where(config('sales.order_table').'.user_id', $userId);
    }
}
