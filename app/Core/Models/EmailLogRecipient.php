<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

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
