<?php

namespace App\Core\Models;

use App\Core\Base\Model;
use App\Core\Components\Auditing\Auditable;
use App\Core\Exceptions\SubscriberException;
use App\Core\Support\Cacheable\CacheableEloquent;
use App\Core\Traits\GeneratesUnique;
use Illuminate\Database\Eloquent\SoftDeletes;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Subscribers.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $unique_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Campaign[] $campaign
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers mails($mail)
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers idOrUuId($id_or_uuid, $first = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Subscribers uuid($unique_id, $first = true)
 */
class Subscribers extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;
    use GeneratesUnique;
    use Auditable;
    use CacheableEloquent;
    /**
     * @var string
     */
    protected $table = 'subscribers';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'unique_id',
    ];

    /**
     * bootable methods fix.
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function campaign()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_subscribers', 'subscriber_id', 'campaign_id')->withTimestamps();
    }

    /**
     * @param $query
     * @param $mail
     */
    public function scopeMails($query, $mail)
    {
        $query->where('email', $mail);
    }


    /**
     * @param $email
     *
     * @return mixed
     */
    public function findSubscriber($email)
    {
        $subscriber = $this->where('email', $email)->first();

        return $subscriber;
    }

    /**
     * @param $data
     * @param $list
     *
     * @return bool
     */
    private function createSubscriber($data, $list)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
        $this->save();
        if (!is_null($list)) {
            $list->subscribers()->attach($this);
            $list->save();
        }

        return true;
    }

    /**
     * @param $request
     * @param $campaignId
     *
     * @return bool
     */
    public function createSubscription($request, $campaignId)
    {
        $mail = $request->get('subscriber_email');
        $list = Campaign::find($campaignId);
        $info = [
            'email' => $mail,
        ];

        if (is_null($subscriber = $this->where('email', $mail)->first())) {
            if (!is_null($list)) {
                $list->subscribers()->attach($subscriber);
                $list->save();
                $this->createSubscriber($info, $list);

                return true;
            } else {
                return false;
            }
        } else {
            $countListEmail = $list->subscribers()->where('email', $mail)->count();

            if ($countListEmail == 0) {
                $subscriber = $this->mails($mail)->first();
                $list->subscribers()->sync([$subscriber->id]);

                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @param $request
     * @param $type
     * @param $subscription_id
     * @return bool
     * @throws SubscriberException
     */
    public function deleteSubscription($request, $type, $subscription_id)
    {
        $mail = $request->get('subscriber_email');
        $subscriber = $this->where('email', $mail)->first();

        if (is_null($subscriber)) {
            throw (new SubscriberException())->setModel(
                get_class($this->model)
            );
        }

        foreach ($subscriber->newsList as $list) {
            if ($list->name == $type || $type === null) {
                $list->subscribers()->detach($subscriber);
            }
        }

        if (is_null($type)) {
            $subscriber->delete();

            return true;
        }
    }

    /**
     * @param null $type
     *
     * @return mixed
     */
    public function getNewsList($type = null)
    {
        if (is_null($type)) {
            return Campaign::all();
        } else {
            return Campaign::findByField('listName', $type);
        }
    }
}
