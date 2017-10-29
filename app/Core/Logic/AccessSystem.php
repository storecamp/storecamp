<?php

namespace App\Core\Logic;

use App\Core\Contracts\AccessSystemContract;
use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\PermissionRepositoryEloquent;
use App\Core\Repositories\RolesRepository;
use App\Core\Repositories\RolesRepositoryEloquent;

class AccessSystem implements AccessSystemContract
{
    /**
     * @var RolesRepositoryEloquent
     */
    protected $roleRepository;

    /**
     * @var PermissionRepositoryEloquent
     */
    protected $permissionRepository;

    /**
     * @return RolesRepositoryEloquent
     */
    public function getRoleRepository(): RolesRepositoryEloquent
    {
        if($this->roleRepository && $this->roleRepository instanceof RolesRepositoryEloquent) {
            return $this->roleRepository;
        } else {
            return $this->roleRepository = app(RolesRepository::class);
        }
    }

    /**
     * @return PermissionRepositoryEloquent
     */
    public function getPermissionsRepository(): PermissionRepositoryEloquent
    {
        if($this->permissionRepository && $this->permissionRepository instanceof PermissionRepositoryEloquent) {
            return $this->permissionRepository;
        } else {
            return $this->permissionRepository = app(PermissionRepository::class);
        }
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
                $roles = $this->getRoleRepository()->with($with)->find($id);
            } else {
                $roles = $this->getRoleRepository()->find($id);
            }
        } else {
            if (!empty($with)) {
                $roles = $this->getRoleRepository()->with($with)->paginate();
            } else {
                $roles = $this->getRoleRepository()->paginate();
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
            $permissions = $this->getPermissionsRepository()->find($id);
        } else {
            if (!empty($with)) {
                $permissions = $this->getPermissionsRepository()->with($with)->paginate();
            } else {
                $permissions = $this->getPermissionsRepository()->paginate();
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
        $role = $this->getRoleRepository()->store($data);

        return $role;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createPermission(array $data)
    {
        $permission = $this->getPermissionsRepository()->create($data);

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
        $role = $this->getRoleRepository()->find($id);
        $role = $this->getRoleRepository()->renew($data, $permissions, $role);

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
        $permission = $this->getPermissionsRepository()->update($data, $id);

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
        $deleted = $this->getRoleRepository()->delete($id);

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
        $deleted = $this->getPermissionsRepository()->delete($id);

        return $deleted;
    }
}
