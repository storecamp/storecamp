<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\EmailLogRecipient
 *
 * @property int $id
 * @property string $unique_id
 * @property int $email_log_id
 * @property string $email
 * @property string|null $name
 * @property string $type
 * @property string $status
 * @property string|null $status_desc
 * @property string|null $timestamp
 * @property string|null $user_agent
 * @property int $open_count
 * @property int $click_count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property-read \App\Core\Models\EmailLog $emailLog
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereClickCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereEmailLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereOpenCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLogRecipient whereUserAgent($value)
 * @mixin \Eloquent
 */
class EmailLogRecipient extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use Auditable;
    use CacheableEloquent {
        CacheableEloquent::newEloquentBuilder as cache_newEloquentBuilder;
    }
    use \App\Core\Traits\Searchable;

    protected $table = 'email_log_recipients';

    protected $fillable = [
        'email_log_id',
        'email',
        'name',
        'type',
        'status',
    ];

    private $rules = [
        'email' => 'required',
        'type' => 'required',
    ];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return \App\Core\Support\Cacheable\EloquentBuilder
     */
    public function newEloquentBuilder($query)
    {
        return $this->cache_newEloquentBuilder($query);
    }
    /**
     * Get the log for the recipient.
     */
    public function emailLog()
    {
        return $this->belongsTo(EmailLog::class);
    }

}
