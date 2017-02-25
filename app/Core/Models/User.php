<?php

namespace App\Core\Models;

use App\Core\Access\Traits\AccessUserTrait;
use App\Core\Components\Auditing\Auditable;
use App\Core\Components\Messenger\Traits\Messagable;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Core\Traits\GeneratesUnique;
use Plank\Mediable\Mediable;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User
 *
 * @package App\Core\Models
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\ProductReview[] $productReview
 * @property-write mixed $date
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Messenger\Models\Message[] $messages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Messenger\Models\Thread[] $threads
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Media[] $media
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\User withMediaMatchAll($tags = array())
 */
class User extends Authenticatable implements Transformable, AuthenticatableContract,
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
        'name', 'notify', 'email', 'password', 'logo_path'
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
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * bootable methods fix
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
        return $this->hasOne(config('shop.cart'), 'user_id');
    }

    /**
     * One-to-Many relations with Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(config('shop.order'), 'user_id');
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
     * check if the given customer is admin
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    /**
     * CHECK if the customer is the owner of the instance
     * @param $instance
     * @return bool
     */
    public function isOwner($instance)
    {
        if ($this->id == $instance->user()->id) {
            return true;
        } else return false;
    }

    /**
     * @param $query
     * @param $name
     */
    public function scopeByMailOrName($query, $name)
    {
        $query->where("name", $name)->orWhere('email', $name);
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
     * find user by slug
     *
     * @param $slug
     * @return mixed
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
