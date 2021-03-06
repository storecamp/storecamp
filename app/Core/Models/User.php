<?php

namespace App\Core\Models;

use App\Core\Access\Traits\AccessUserTrait;
use App\Core\Base\UserAuth as Authenticatable;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use App\Core\Traits\Messagable;
use App\Core\Traits\Searchable;
use App\Core\Traits\ViewCounterTrait;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Plank\Mediable\Mediable;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property string $ip
 * @property string $password
 * @property string $slug
 * @property string $logo_path
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $notify
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\ProductReview[] $reviews
 * @property-write mixed $date
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Role[] $roles
 * @property-read Message[] $messages
 * @property-read Thread[] $threads
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereLogoPath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereNotify($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User today()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User byMailOrName($name)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User allExcept()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User users()
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Media[] $media
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User withMediaMatchAll($tags = array())
 *
 * @property string $locale
 * @property bool $banned
 * @property-read \App\Core\Models\Cart $cart
 * @property-read int $shop_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Orders[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\UserCounter[] $user_counters
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereBanned($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereLocale($value)
 */
class User extends Authenticatable implements
    Transformable,
    AuthenticatableContract,
    CanResetPasswordContract
{
    use TransformableTrait;
    use Notifiable;
    use \Cviebrock\EloquentSluggable\Sluggable;
    use \Illuminate\Auth\Authenticatable, CanResetPassword;
    use AccessUserTrait;
    use GeneratesUnique;
    use Messagable;
    use Auditable;
    use Mediable;
    use CacheableEloquent;
    use ViewCounterTrait;
    use Searchable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'notify', 'email', 'password', 'logo_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at'];

    /**
     * @var array
     */
    protected $with = ['roles'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /*
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.name'       => 10,
            'users.email'      => 10,
        ],
    ];

    /**
     * bootable methods fix.
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * One-to-Many relations with cart.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cart()
    {
        return $this->hasOne(config('sales.cart'), 'user_id');
    }

    /**
     * One-to-Many relations with Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(config('sales.order'), 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReview()
    {
        return $this->hasMany(ProductReview::class, 'user_id');
    }

    /**
     * Returns the user ID value based on the primary key set for the table.
     *
     * @return int
     */
    public function getShopIdAttribute()
    {
        return is_array($this->primaryKey) ? 0 : $this->attributes[$this->primaryKey];
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->roles()->first();
    }

    /**
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * @param string $value
     */
    public function setIsAdminAttribute($value)
    {
        $this->is_admin = $this->hasRole('role:Admin');
    }

    /**
     * @param $value
     *
     * @return bool
     */
    public function getIsAdminAttribute($value)
    {
        return $this->hasRole('role:Admin');
    }

    /**
     * @param string $value
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * @var array
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    /**
     * @param $date
     */
    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::today();
    }

    /**
     * check if the given customer is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    /**
     * CHECK if the customer is the owner of the instance.
     *
     * @param $instance
     *
     * @return bool
     */
    public function isOwner($instance)
    {
        if ($this->id == $instance->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $query
     * @param $name
     */
    public function scopeByMailOrName($query, $name)
    {
        $query->where('name', $name)->orWhere('email', $name);
    }

    /**
     * @param $query
     */
    public function scopeToday($query)
    {
        return $query->where('date', '=', Carbon::today());
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeAllExcept($query)
    {
        return $query->where('id', '<>', \Auth::id());
    }

    /**
     * @param $query
     */
    public function scopeUsers($query)
    {
        return $query->where('user_id', '=', \Auth::id());
    }

    /**
     * find user by slug.
     *
     * @param $slug
     *
     * @return mixed
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
