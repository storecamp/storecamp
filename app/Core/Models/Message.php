<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Message.
 *
 * @property int $id
 * @property string $unique_id
 * @property int $thread_id
 * @property int $user_id
 * @property int $parent_id
 * @property string $body
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Thread[] $childThread
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Participant[] $participants
 * @property-read \App\Core\Models\Thread $thread
 * @property-read \App\Core\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Message whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 */
class Message extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use CacheableEloquent;

    protected $fillable = ['thread_id', 'user_id', 'body', 'banned'];

    public static function boot()
    {
        parent::boot();
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['thread'];

    /**
     * @var array
     */
    protected $with = ['childThread'];
    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required',
    ];

    /**
     * Thread relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childThread()
    {
        return $this->hasMany(Thread::class, 'parent_id');
    }

    /**
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(config('messenger.user_model'));
    }

    /**
     * Participants relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants()
    {
        return $this->hasMany(Participant::class, 'thread_id', 'thread_id');
    }

    /**
     * Recipients of this message.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipients()
    {
        return $this->participants()->where('user_id', '!=', $this->user_id);
    }
}
