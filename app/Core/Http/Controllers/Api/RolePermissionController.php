<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\RolesRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

/**
 * Class RolePermissionsController
 * @package App\Http\Controllers
 */
class RolePermissionController extends Controller {

    private $role;
    /**
     * @var PermissionRepository
     */
    private $permission;

    /**
     * RolePermissionController constructor.
     * @param RolesRepository $role
     * @param PermissionRepository $permission
     */
    public function __construct(RolesRepository $role, PermissionRepository $permission)
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
