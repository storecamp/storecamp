<?php

namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Mail
 *
 * @property int $id
 * @property string $unique_id
 * @property int $user_id
 * @property string $from
 * @property string $to
 * @property string $subject
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Mail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 */
class Mail extends Model implements Transformable
{
    use TransformableTrait;
    use Auditable;
    use GeneratesUnique;

    protected $table = "mails";
    protected $fillable = ["from", "to", "subject", "message", "user_id"];

    /**
     * bootable methods fix
     */
    public static function boot()
    {
        parent::boot();
    }
}
