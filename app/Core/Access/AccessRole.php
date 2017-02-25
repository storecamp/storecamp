<?php namespace App\Core\Access;

/**
 * This file is part of Access,
 * a role & permission management solution for Syrinx.
 *
 * @license MIT
 * @package App\Core\Access
 * @property int $id
 * @property string $unique_id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Permission[] $perms
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */

use App\Core\Access\Contracts\AccessRoleInterface;
use App\Core\Access\Traits\AccessRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class AccessRole extends Model implements AccessRoleInterface
{
    use AccessRoleTrait;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('access.roles_table');
    }

    /**
     * @return bool
     */
    public function isAppsDefault(): bool
    {
        $isDefault = ($this->name === "Client") || ($this->name === "Admin") ? true : false;
        return $isDefault;
    }
}
