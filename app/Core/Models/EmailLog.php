<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\EmailLog
 *
 * @property int $id
 * @property string $unique_id
 * @property string|null $message_id
 * @property string $from
 * @property string|null $from_name
 * @property string|null $reply_to
 * @property string $subject
 * @property string|null $text
 * @property string $status
 * @property string|null $delay_time
 * @property int $is_drafted
 * @property string|null $html
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property-read mixed $bcc
 * @property-read mixed $cc
 * @property-read mixed $to
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\EmailLogRecipient[] $recipients
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Base\Model findByField($field, $value, $columns)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog uuid($unique_id, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereDelayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereIsDrafted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereReplyTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereUniqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\EmailLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailLog extends Model implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use Auditable;
    use CacheableEloquent {
        CacheableEloquent::newEloquentBuilder as cache_newEloquentBuilder;
    }
    use \App\Core\Traits\Searchable;

    public function newEloquentBuilder($query)
    {
        return $this->cache_newEloquentBuilder($query);
    }

    protected $table = 'email_logs';

    /**
     * @var array
     */
    public $rules = [
        'from' => 'required',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'message_id',
        'from',
        'from_name',
        'reply_to',
        'subject',
        'text',
        'html',
        'status',
        'delay_time',
        'is_drafted'
    ];

    /**
     * @var array
     */
    public $statuses = [];

    public static function boot()
    {
        parent::boot();
    }

    /**
     * EmailLog constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->statuses = ['pending' => 0, 'failed' => 1, 'sent' => 2];
    }

    /**
     * @var array
     */
    protected $with = ['recipients'];

    /**
     * @var array
     */
    protected $appends = ['bcc', 'cc', 'to'];

    /**
     * @return mixed
     */
    public function getBccAttribute()
    {
        return $this->recipients->where('type', 'bcc')->pluck('email');
    }

    /**
     * @return mixed
     */
    public function getToAttribute()
    {
        return $this->recipients->where('type', 'to')->pluck('email');
    }


    /**
     * @return mixed
     */
    public function getCcAttribute()
    {
        return $this->recipients->where('type', 'cc')->pluck('email');
    }

    /**
     * @param $arr
     * @return array
     */
    public static function array_reverse_recursive($arr)
    {
        foreach ($arr as $key => $val) {
            if (is_array($val))
                $arr[$key] = self::array_reverse_recursive($val);
        }
        return array_reverse($arr);
    }

    /**
     * @return string
     */
    public function getStatusAttribute()
    {
        if ($this->attributes['status']) {
            $statuses = [];
            foreach ($this->statuses as $key => $item) {
                $statuses[$item] = $key;
            };
            return $statuses[$this->attributes['status']];
        } else {
            return 'pending';
        }
    }

    public function setStatusAttribute($value)
    {
        if ($value) {
            if (is_string($value)) {
                $statuses = array_keys($this->statuses);
                if (in_array($value, $statuses)) {
                    $this->attributes['status'] = $this->statuses[$value];
                }
            }
            if (is_integer($value) && $value <= 2) {
                $this->attributes['status'] = $value;
            }
        } else {
            $this->attributes['status'] = $this->statuses['pending'];
        }
    }

    /**
     * Get the recipients for the email.
     */
    public function recipients()
    {
        return $this->hasMany(EmailLogRecipient::class);
    }

    /**
     * Create Email Log and add email recipients
     *
     * @param array $data
     * @param array $recipients
     * @return bool
     * @throws ValidationException
     */
    public function createLog(array $data, Array $recipients)
    {
        //save email to log
        $emailLogObject = new EmailLog();
        if (!$emailLogObject->validate($data)) {
            return false;
        }
        $emailLog = $emailLogObject->create($data);

        //save email recipients
        $recipientList = [];
        foreach ($recipients as $row) {
            $recipient = new EmailLogRecipient($row);
            if ($recipient->validate($row)) {
                $recipientList[] = $recipient;
            }
        }

        $emailLog->recipients()->saveMany($recipientList);
        if (!empty($data['delay_time'])) {
            $emailLog->status = 'pending';
            $emailLog->delay_time = $data['delay_time'];
            $emailLog->save();
        } elseif (!empty($data['is_drafted']) && $data['is_drafted']) {
            $emailLog->status = 'pending';
            $emailLog->save();
        } else {
            $emailLog->status = 'sent';
            $emailLog->save();
        }
    }

    /**
     * Update Email Log and add email recipients
     *
     * @param array $data
     * @param array $recipients
     * @return bool
     * @throws /Exception
     */
    public function updateLog(array $data, Array $recipients)
    {
        //save email to log
        $emailLogObject = new EmailLog();
        if (!$emailLogObject->validate($data)) {
            return false;
        }
        $emailLog = $emailLogObject->find($data['id']);
        $emailLog->update($data);

        //save email recipients
        $recipientList = [];
        foreach ($recipients as $row) {
            $recipient = new EmailLogRecipient($row);
            if ($recipient->validate($row)) {
                $recipientList[] = $recipient;
            }
        }

        foreach ($emailLog->recipients as $recipient) {
            $recipient->delete();
        }

        $emailLog->recipients()->saveMany($recipientList);
        if (!empty($data['delay_time'])) {
            $emailLog->status = 'pending';
            $emailLog->delay_time = $data['delay_time'];
            $emailLog->save();
        } elseif (!empty($data['is_drafted']) && $data['is_drafted']) {
            $emailLog->status = 'pending';
            $emailLog->save();
        } else {
            $emailLog->status = 'sent';
            $emailLog->save();
        }
    }

    /**
     * Update recipient status
     * @param $messageId
     * @param $email
     * @param $status
     * @param array $data
     * @return bool
     */
    public function updateRecipientStatus($messageId, $email, $status, $data = [])
    {
        $recipient = EmailLogRecipient::where('email', $email)
            ->whereHas('emailLog', function ($query) use ($messageId) {
                $query->where('message_id', $messageId);
            })->first();

        if (!$recipient) {
            return false;
        }

        //don't change status for clicks and opens
        switch ($status) {
            case 'click':
                $recipient->increment('click_count');
            case 'open':
                $recipient->increment('open_count');
            default:
                if (isset($data['timestamp'])) {
                    //check that we don't replace newest status
                    if ($recipient->timestamp > $data['timestamp']) {
                        return false;
                    }
                    $recipient->timestamp = $data['timestamp'];
                }
                if (isset($data['reason'])) {
                    $recipient->status_desc = $data['reason'];
                }
                if (isset($data['response'])) {
                    $recipient->status_desc = $data['response'];
                }
                if (isset($data['useragent'])) {
                    $recipient->user_agent = $data['useragent'];
                }
                $recipient->status = $status;
        }

        $recipient->save();
    }

    /**
     * @return mixed
     */
    public function getDelayedActiveEmails()
    {
        $emailLog = new EmailLog();
        $emails = $emailLog
            ->where('delay_time', '<=', Carbon::now())
            ->where('is_drafted', '=', 0)
            ->where('status', 0)->get();

        return $emails;
    }

}
