<?php

namespace App\Core\Access;

/*
 * This file is part of Access,
 * a role & permission management solution for Laravel.
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Models\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereUniqueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Access\AccessPermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */

use App\Core\Access\Contracts\AccessPermissionInterface;
use App\Core\Access\Traits\AccessPermissionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class AccessPermission extends Model implements AccessPermissionInterface
{
    use AccessPermissionTrait;
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
        $this->table = Config::get('access.permissions_table');
    }
}
