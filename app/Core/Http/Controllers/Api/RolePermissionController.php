<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Core\Models\Permission;
use App\Core\Models\Role;
use Illuminate\Http\Request;

/**
 * Class RolePermissionsController
 * @package App\Http\Controllers
 */
class RolePermissionController extends Controller
{

    /**
     * @var Role
     */
    private $role;
    /**
     * @var Permission
     */
    private $permission;

    /**
     * RolePermissionController constructor.
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function getAllRoles(Request $request)
    {
        $roles = $this->role->all();

        return response()->json($roles);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPermissions(Request $request)
    {
        $roles = $this->permission->all();

        return response()->json($roles);
    }
}
