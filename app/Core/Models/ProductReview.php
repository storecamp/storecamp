<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Core\Traits\GeneratesUnique;
use App\Core\Components\Messenger\Models\Thread;
use Toastr;

/**
 * Class ProductReview
 *
 * @package App\Core\Models
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string $unique_id
 * @property string $review
 * @property bool $hidden
 * @property bool $rating
 * @property \Carbon\Carbon $date
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Core\Models\User $user
 * @property-read \App\Core\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Messenger\Models\Thread[] $thread
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereReview($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereHidden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereRating($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview users()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview today()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview usersByID($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview onlyVisible()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview onlyHidden()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview byRating($reason)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Messenger\Models\Thread[] $comments
 */
class ProductReview extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use GeneratesUnique;
    use Auditable;

    /**
     * @var string
     */
    protected $table = "product_reviews";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product', 'user_id', 'review', 'rating', 'unique_id', 'hidden', 'date'];

    /**
     * @var array
     */
    protected $dates = ['date'];


    /**
     * bootable methods fix
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * Get all of the product reviews's comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Thread::class, 'commentable');
    }

    /**
     * @param $date
     */
    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::today();
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getThread()
    {
        return $this->comments()->first();
    }

    /**
     * @param $query
     */
    public function scopeUsers($query)
    {
        $query->where("user_id", \Auth::user()->id);
    }

    /**
     * @param $query
     */
    public function scopeToday($query)
    {
        $query->where('date', '=', Carbon::today());
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOnlyVisible($query)
    {

        return $query->where("hidden", false);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOnlyHidden($query)
    {
        return $query->where("hidden", true);
    }

    /**
     * @param $query
     * @param $rating
     * @return mixed
     */
    public function scopeByRating($query, $rating)
    {
        return $query->where("rating", $rating);
    }

}
