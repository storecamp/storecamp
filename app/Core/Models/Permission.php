<?php


namespace App\Core\Models;

use App\Core\Access\AccessPermission;
use App\Core\Components\Auditing\Auditable;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * App\Core\Models\Permission
 *
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Permission whereDeletedAt($value)
 */
class Permission extends AccessPermission implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use Auditable;

    /**
     * bootable methods fix
     */
    public static function boot()
    {
        parent::boot();
    }
}
