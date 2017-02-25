<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Campaign
 *
 * @property int $id
 * @property string $campaign
 * @property string $unique_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Subscribers[] $subscribers
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Campaign whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Campaign whereCampaign($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Campaign whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Campaign whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Campaign whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 */
class Campaign extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use GeneratesUnique;
    use Auditable;


    protected $table = "campaigns";

    protected $fillable = [
        'campaign',
        'unique_id'
    ];

    /**
     * bootable methods fix
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(Subscribers::class, "campaign_subscribers", 'campaign_id', 'subscriber_id')->withTimestamps();
    }
}
