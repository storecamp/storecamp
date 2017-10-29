<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Contracts\AccessSystemContract;
use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\RolesRepository;
use App\Core\Validators\Role\RolesFormRequest;
use App\Core\Validators\Role\RolesUpdateFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class AccesssController
 * @package App\Http\Controllers
 */
class AccessController extends \App\Core\Http\Controllers\Controller
{
    /**
     * @var RolesRepository
     */
    protected $rolesRepository;
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    protected $accessSystem;

    /**
     * RolesController constructor.
     *
     * @param AccessSystemContract $accessSystem
     */
    public function __construct(AccessSystemContract $accessSystem)
    {
        $this->accessSystem = $accessSystem;
        $this->rolesRepository = $accessSystem->getRoleRepository();
        $this->permissionRepository = $accessSystem->getPermissionsRepository();
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllRoles(Request $request)
    {
        $roles = $this->rolesRepository->all();

        return response()->json($roles);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexRoles(Request $request)
    {
        $roles = $this->rolesRepository->with('perms')->paginate();

        $roles->getCollection()->map(function ($item) {
            if ($item->display_name == "admin" || $item->display_name == "client") {
                $item['default'] = true;
            } else {
                $item['default'] = false;
            }
        });

        return response()->json($roles);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRolesCount(Request $request)
    {
        $count = $this->rolesRepository->count();

        return response()->json($count);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPermissions(Request $request)
    {
        $roles = $this->permissionRepository->all();

        return response()->json($roles);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexPermissions(Request $request)
    {
        $permissions = $this->permissionRepository->paginate();

        return response()->json($permissions);
    }

    /**
     * @param RolesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RolesFormRequest $request)
    {
        $data = $request->all();

        $role = $this->accessSystem->createRole($data);

        return response()->json(compact('role'));
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $data = $request->all();
        $role = $this->accessSystem->presentRoles($data, $id, ['perms']);

        return response()->json(compact('role'));
    }

    /**
     * @param RolesUpdateFormRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RolesUpdateFormRequest $request, $id)
    {
        try {
            $data = $request->all();
            $this->accessSystem->updateRole($data, $id);

            return response()->json(['msg' => 'Role updated']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->accessSystem->deleteRole($id);
            if (!$deleted) {
                return response()->json(['msg' => 'Sorry role is not deleted!'], 500);
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        } catch (\Throwable $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        }
    }
}
