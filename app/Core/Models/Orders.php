<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Contracts\OrderInterface;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\CalculationsTrait;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Orders.
 *
 * @property int $id
 * @property string $unique_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereUserId($value)
 * @mixin \Eloquent
 * @property string $statusCode
 * @property-read string. $calculations_cache_key
 * @property-read int $count
 * @property-read string $display_total
 * @property-read string $display_total_discount
 * @property-read string $display_total_price
 * @property-read string $display_total_shipping
 * @property-read string $display_total_tax
 * @property-read bool $has_failed
 * @property-read bool $is_canceled
 * @property-read bool $is_completed
 * @property-read bool $is_in_creation
 * @property-read bool $is_in_process
 * @property-read bool $is_locked
 * @property-read bool $is_pending
 * @property-read float $total
 * @property-read float $total_discount
 * @property-read float $total_price
 * @property-read float $total_shipping
 * @property-read float $total_tax
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Transaction[] $transactions
 * @property-read \App\Core\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders findByUser($userId, $statusCode = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereSKU($sku)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereStatus($statusCode)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereStatusCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereStatusIn($statusCodes)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Orders whereUser($userId)
 */
class Orders extends Model implements Transformable, OrderInterface
{
    use TransformableTrait;
    use GeneratesUnique;
    use CalculationsTrait;
    use SoftDeletes;
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
    protected $fillable = ['user_id', 'statusCode'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('sales.order_table');
    }

    /**
     * Boot the user model
     * Attach event listener to remove the relationship records when trying to delete
     * Will NOT delete any records if the user model uses soft deletes.
     *
     * @return void|bool
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($user) {
            if (! method_exists(config('auth.providers.users.model'), 'bootSoftDeletingTrait')) {
                $user->items()->sync([]);
            }

            return true;
        });
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'user_id');
    }

    /**
     * One-to-Many relations with Item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(config('sales.transaction'), 'order_id');
    }

    /**
     * Returns flag indicating if order is lock and cant be modified by the user.
     * An order is locked the moment it enters pending status.
     *
     * @return bool
     */
    public function getIsLockedAttribute(): bool
    {
        return in_array($this->attributes['statusCode'], config('sales.order_status_lock'));
    }

    /**
     * Scopes class by user ID and returns object.
     * Optionally, scopes by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query  Query.
     * @param mixed                                 $userId User ID.
     *
     * @return Builder
     */
    public function scopeWhereUser($query, $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scopes class by product sku.
     * Optionally, scopes by status.
     *
     * @param Builder $query  Query.
     * @param mixed                                 $sku    Item SKU.
     *
     * @return Builder
     */
    public function scopeWhereSKU($query, $sku): Builder
    {
        return $query->join(
            config('sales.cart_table'),
            config('sales.cart_table').'.order_id',
            '=',
            $this->table.'.id'
        )
            ->where(config('sales.cart_table').'.sku', $sku);
    }

    /**
     * Scopes class by user ID and returns object.
     * Optionally, scopes by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query      Query.
     * @param string                                $statusCode Status.
     *
     * @return Builder
     */
    public function scopeWhereStatus($query, $statusCode): Builder
    {
        return $query = $query->where('statusCode', $statusCode);
    }

    /**
     * Scopes class by status codes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query       Query.
     * @param array                                 $statusCodes Status.
     *
     * @return Builder
     */
    public function scopeWhereStatusIn($query, array $statusCodes): Builder
    {
        return $query = $query->whereIn('statusCode', $statusCodes);
    }

    /**
     * Scopes class by user ID and returns object.
     * Optionally, scopes by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query      Query.
     * @param mixed                                 $userId     User ID.
     * @param string                                $statusCode Status.
     *
     * @return Builder
     */
    public function scopeFindByUser($query, $userId, $statusCode = null): Builder
    {
        if (! empty($status)) {
            $query = $query->whereStatus($status);
        }

        return $query->whereUser($userId)->get();
    }

    /**
     * @param string $statusCode
     * @return bool
     */
    public function isStatus(string $statusCode): bool
    {
        return $this->attributes['statusCode'] == $statusCode;
    }

    /**
     * Returns flag indicating if order is completed.
     *
     * @return bool
     */
    public function getIsCompletedAttribute(): bool
    {
        return $this->attributes['statusCode'] == 'completed';
    }

    /**
     * Returns flag indicating if order has failed.
     *
     * @return bool
     */
    public function getHasFailedAttribute(): bool
    {
        return $this->attributes['statusCode'] == 'failed';
    }

    /**
     * Returns flag indicating if order is canceled.
     *
     * @return bool
     */
    public function getIsCanceledAttribute(): bool
    {
        return $this->attributes['statusCode'] == 'canceled';
    }

    /**
     * Returns flag indicating if order is in process.
     *
     * @return bool
     */
    public function getIsInProcessAttribute(): bool
    {
        return $this->attributes['statusCode'] == 'in_process';
    }

    /**
     * Returns flag indicating if order is in creation.
     *
     * @return bool
     */
    public function getIsInCreationAttribute(): bool
    {
        return $this->attributes['statusCode'] == 'in_creation';
    }

    /**
     * Returns flag indicating if order is in creation.
     *
     * @return bool
     */
    public function getIsPendingAttribute(): bool
    {
        return $this->attributes['statusCode'] == 'pending';
    }

    /**
     * Creates the order's transaction.
     *
     * @param string $gateway       Gateway.
     * @param mixed  $transactionId Transaction ID.
     * @param string $detail        Transaction detail.
     *
     * @return object
     */
    public function placeTransaction(string $gateway, $transactionId, string $detail = null, $token = null)
    {
        return call_user_func(config('sales.transaction').'::create', [
            'order_id'          => $this->attributes['id'],
            'gateway'           => $gateway,
            'transaction_id'    => $transactionId,
            'detail'            => $detail,
            'token'             => $token,
        ]);
    }

    /**
     * Retrieves product from order;.
     *
     * @param string $sku SKU of product.
     *
     * @return mixed
     */
    private function getItem(string $sku)
    {
        $className = config('sales.product');
        $item = new $className();

        return $item->where('sku', $sku)
            ->where('order_id', $this->attributes['id'])
            ->first();
    }
}
