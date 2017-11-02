<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Contracts\UsersSystemContract;
use App\Core\Http\Controllers\Controller;
use App\Core\Models\User;
use App\Core\Validators\User\UsersFormRequest;
use App\Core\Validators\User\UsersUpdateFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class UserssController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{

    /**
     * @var User
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
        $this->user = $usersSystem->user;
    }

    /**
     * Get all Users
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $users = $this->user->paginate();

        return response()->json($users);
    }

    /**
     * Show the user by id
     *
     * @param Request $request
     * @param int|string $id
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        return response()->json($user);
    }

    /**
     * Get amount of users
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function count(Request $request)
    {
        $count = $this->user->count();

        return response()->json($count);
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
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function toggleBan(Request $request, $id)
    {
        try {
            $user = $this->user->find($id);
            if ($user->hasRole('Admin')) {
                $msg = 'Error! ' . '<b>Not allowed</b>' . 'Can\'t be banned!';

                return response()->json(['msg' => $msg]);
            } else {
                try {
                    $actionUser = \JWTAuth::parseToken()->authenticate();
                } catch (JWTException $exception) {
                    $actionUser = null;
                }
                if ($actionUser && $actionUser->hasRole('Admin')) {
                    if ($user->banned === 0) {
                        $msg = 'Warning! User Banned';
                        $user->banned = 1;
                    } else {
                        $msg = 'Info! User UnBanned';
                        $user->banned = 0;
                    }
                    $user->save();
                } else {
                    return response()->json(['msg' => 'Error! <b>Not allowed</b>' . 'Can\'t be banned!']);
                }
            }

            return response()->json(['msg' => $msg]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
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
                throw new \Exception('Sorry user is not deleted', 500);
            }
            \DB::commit();
            return response()->json(['msg' => 'ok']);
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json(['msg' => $e->getMessage()], $e->getCode());
        }
    }
}
