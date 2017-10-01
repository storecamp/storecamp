<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Contracts\UsersSystemContract;
use App\Core\Repositories\UserRepository;
use App\Core\Validators\User\UsersFormRequest;
use App\Core\Validators\User\UsersUpdateFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

/**
 * Class UserssController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{

    /**
     * @var
     */
    private $user;
    /**
     * @var UsersSystemContract
     */
    private $usersSystem;

    /**
     * UsersController constructor.
     * @param UsersSystemContract $usersSystem
     */
    public function __construct(UsersSystemContract $usersSystem)
    {
        $this->usersSystem = $usersSystem;
        $this->user = $usersSystem->userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $users = $this->user->paginate();

        return response()->json($users);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        return response()->json($user);
    }

    /**
     * @param UsersUpdateFormRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UsersUpdateFormRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            \DB::beginTransaction();
            $data = !$request->has('password') ?
                $request->except('password') : $request->all();
            $rolesArr = [];
            foreach ($data['roles'] as $role) {
                $rolesArr[] = $role['id'];
            }
            $data['role'] = $rolesArr;
            $this->usersSystem->update($data, $id);
            $user = $this->user->findOrFail($id);
            \DB::commit();
            return response()->json($user);
        } catch (\Throwable $exception) {
            \DB::rollBack();
            return response()->json(['msg' => 'Error during user update!'], $exception->getCode());
        }
    }

    /**
     * @param UsersFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UsersFormRequest $request): JsonResponse
    {
        try {
            \DB::beginTransaction();
            $data = $request->all();
            $rolesArr = [];
            foreach ($data['roles'] as $role) {
                $rolesArr[] = $role['id'];
            }
            $data['role'] = $rolesArr;
            $user = $this->usersSystem->create($data);
            \DB::commit();
            return response()->json($user);
        } catch (\Throwable $exception) {
            \DB::rollBack();
            return response()->json(['msg' => 'Error during user create', 'server_msg' => $exception->getMessage()], $exception->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            \DB::beginTransaction();
            $deleted = $this->usersSystem->delete($id);
            if (!$deleted) {
                return response()->json(['msg' => 'Sorry user is not deleted'], 500);
            }
            \DB::commit();
            return response()->json(['msg' => 'ok']);
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();
            return response()->json(['msg' => 'Error during user delete'], $e->getCode());
        }
    }
}
