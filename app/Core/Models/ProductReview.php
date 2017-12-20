<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class ProductReview.
 *
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
 * @property-read Thread[] $thread
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
 * @property-read Thread[] $comments
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\ProductReview withoutTrashed()
 */
class ProductReview extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use GeneratesUnique;
    use Auditable;
    use CacheableEloquent;

    /**
     * @var string
     */
    protected $table = 'product_reviews';

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
     * @var Role
     */
    public $role;
    /**
     * @var Product
     */
    public $product;
    /**
     * @var Thread
     */
    public $thread;
    /**
     * @var Message
     */
    public $message;
    /**
     * @var
     */
    public $productDescription;
    /**
     * @var Participant
     */
    public $participant;

    /**
     * ProductReview constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->role = new Role();
        $this->thread = new Thread();
        $this->message = new Message();
        $this->participant = new Participant();
    }

    /**
     * bootable methods fix.
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
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getThread()
    {
        return $this->comments()->first();
    }

    /**
     * return the number of user's products.
     *
     * @return mixed
     */
    public function countUserProductReviews()
    {
        return $this->with('user')->where('user_id', '=', \Auth::id())->count();
    }

    /**
     * get all Products.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->latest('created_at')->paginate();
    }

    /**
     * get all current logged in user Reviews.
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->latest('created_at')->users()->paginate();
    }

    /**
     * get the specific to user id feedbacks.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getAllUserById($id)
    {
        return $this->latest('created_at')->usersById($id)->paginate();
    }

    /**
     * @param $id
     * @param $message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function replyProductReview($id, $message)
    {
        $productReview = $this->with('comments')->find($id);
        $thread = $productReview->comments->first();
        $thread->activateAllParticipants();
        $user_id = \Auth::user()->id;
        // Message
        $this->message->create(
            [
                'thread_id' => $thread->id,
                'user_id' => $user_id,
                'body' => $message,
            ]
        );

        // Add replier as a participant
        $participant = $this->participant->firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id' => $user_id,
            ]
        );
        $participant->last_read = new Carbon();
        $participant->save();

        return $productReview;
    }

    /**
     * @param $query
     */
    public function scopeUsers($query)
    {
        $query->where('user_id', \Auth::user()->id);
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
     *
     * @return mixed
     */
    public function scopeOnlyVisible($query)
    {
        return $query->where('hidden', false);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeOnlyHidden($query)
    {
        return $query->where('hidden', true);
    }

    /**
     * @param $query
     * @param $rating
     *
     * @return mixed
     */
    public function scopeByRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }
}
