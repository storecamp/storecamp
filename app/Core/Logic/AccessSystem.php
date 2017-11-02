<?php

namespace App\Core\Logic;

use App\Core\Contracts\AccessSystemContract;
use App\Core\Models\Permission;
use App\Core\Models\Role;
use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\PermissionRepositoryEloquent;
use App\Core\Repositories\RolesRepository;
use App\Core\Repositories\RolesRepositoryEloquent;

class AccessSystem implements AccessSystemContract
{
    /**
     * @var Role
     */
    public $role;

    /**
     * @var Permission
     */
    public $permission;

    /**
     * AccessSystem constructor.
     */
    public function __construct()
    {
        $this->role = new Role();
        $this->permission = new Permission();
    }


    /**
     * @param array $data
     * @param null $id
     * @param array $with
     *
     * @return mixed
     */
    public function presentRoles(array $data, $id = null, array $with = [])
    {
        if ($id) {
            if (!empty($with)) {
                $roles = $this->role->with($with)->findOrFail($id);
            } else {
                $roles = $this->role->findOrFail($id);
            }
        } else {
            if (!empty($with)) {
                $roles = $this->role->with($with)->paginate();
            } else {
                $roles = $this->role->paginate();
            }
        }

        return $roles;
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     *
     * @return mixed
     */
    public function presentPermissions(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $permissions = $this->permission->findOrFail($id);
        } else {
            if (!empty($with)) {
                $permissions = $this->permission->with($with)->paginate();
            } else {
                $permissions = $this->permission->paginate();
            }
        }

        return $permissions;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createRole(array $data)
    {
        $role = $this->role->store($data);

        return $role;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createPermission(array $data)
    {
        $permission = $this->permission->create($data);

        return $permission;
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function updateRole(array $data, $id)
    {
        $permissions = $data['permissions'];
        unset($data['permissions']);
        $role = $this->role->findOrFail($id);
        $role = $this->role->renew($data, $permissions, $role);

        return $role;
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function updatePermission(array $data, $id)
    {
        $permission = $this->permission->update($data, $id);

        return $permission;
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function deleteRole($id, array $data = []): int
    {
        $deleted = $this->role->findOrFail($id)->delete();

        return $deleted;
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function deletePermission($id, array $data = []): int
    {
        $deleted = $this->permission->findOrFail($id)->delete();

        return $deleted;
    }
}
