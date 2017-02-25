<?php

namespace App\Core\Logic;

use App\Core\Contracts\AccessSystemContract;
use App\Core\Models\Role;
use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\RolesRepository;

class AccessSystem implements AccessSystemContract
{
    /**
     * @var RolesRepository
     */
    public $rolesRepository;

    /**
     * @var PermissionRepository
     */
    public $permissionRepository;

    /**
     * AccessSystem constructor.
     *
     * @param RolesRepository $rolesRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RolesRepository $rolesRepository, PermissionRepository $permissionRepository)
    {
        $this->rolesRepository = $rolesRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentRoles(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $roles = $this->rolesRepository->find($id);
        } else {
            if (!empty($with)) {
                $roles = $this->rolesRepository->with($with)->paginate();
            } else {
                $roles = $this->rolesRepository->paginate();
            }
        }
        return $roles;
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentPermissions(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $permissions = $this->permissionRepository->find($id);
        } else {
            if (!empty($with)) {
                $permissions = $this->permissionRepository->with($with)->paginate();
            } else {
                $permissions = $this->permissionRepository->paginate();
            }
        }
        return $permissions;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createRole(array $data)
    {
        $role = $this->rolesRepository->store($data);
        return $role;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createPermission(array $data)
    {
        $permission = $this->permissionRepository->create($data);
        return $permission;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateRole(array $data, $id)
    {
        $permissions = $data['permissions'];
        unset($data['permissions']);
        $role = $this->rolesRepository->find($id);
        $role = $this->rolesRepository->renew($data, $permissions, $role);
        return $role;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updatePermission(array $data, $id)
    {
        $permission = $this->permissionRepository->update($data, $id);
        return $permission;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deleteRole($id, array $data = []): int
    {
        $deleted = $this->rolesRepository->delete($id);
        return $deleted;

    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deletePermission($id, array $data = []): int
    {
        $deleted = $this->permissionRepository->delete($id);
        return $deleted;

    }
}