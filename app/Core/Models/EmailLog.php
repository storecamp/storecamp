<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

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
    public static function array_reverse_recursive($arr) {
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
            foreach($this->statuses as $key => $item) {
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
     * @var array
     */
    private $rules = [
        'from' => 'required',
    ];
}
