<?php


namespace App\Core\Models;

use App\Core\Components\Auditing\Auditable;
use App\Core\Access\AccessRole;
use App\Core\Traits\GeneratesUnique;
use RepositoryLab\Repository\Contracts\Transformable;
use RepositoryLab\Repository\Traits\TransformableTrait;

/**
 * Class Role
 *
 * @package App
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Permission[] $perms
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereAdmin()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Components\Auditing\Auditing[] $audits
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Models\Role whereDeletedAt($value)
 */
class Role extends AccessRole implements Transformable
{
    use TransformableTrait;
    use GeneratesUnique;
    use Auditable;

    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * bootable methods fix
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * @return array
     */
    public function getRoleIds()
    {
        $roleAdminArr = $this->users()->get();

        $adminArr = array();

        foreach ($roleAdminArr as $key => $admin) {

            $adminArr[] = $admin->id;
        }
        return array_values($adminArr);
    }

    /**
     * @param $query
     */
    public function scopeWhereAdmin($query){

       $query->where("name", "Admin");
    }

    /**
     * detach all permissions
     */
    public function detachAllPermissions()
    {
        $this->perms()->sync([]);
    }
    /**
     * @param string $name
     * @return mixed
     */
    public function getRoleUsers(string $name)
    {
        $user = new User();
        $roleUsers = $user->getUsersByRole($name);

        return $roleUsers;
    }
}
