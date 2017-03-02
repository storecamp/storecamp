<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\SoftDeletes;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Participant
 *
 * @property int $id
 * @property string $unique_id
 * @property int $thread_id
 * @property int $user_id
 * @property \Carbon\Carbon $last_read
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \App\Core\Models\Thread $thread
 * @property-read \App\Core\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereLastRead($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Participant whereUserId($value)
 * @mixin \Eloquent
 */
class Participant extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use SoftDeletes;
    use CacheableEloquent;

    public static function boot()
    {
        parent::boot();
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participants';

    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */
    protected $fillable = ['thread_id', 'user_id', 'last_read'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'last_read'];

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
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(config('messenger.user_model'));
    }
}
