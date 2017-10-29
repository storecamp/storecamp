<?php

namespace App\Core\Logic;

use App\Core\Contracts\UsersSystemContract;
use App\Core\Models\User;
use App\Core\Repositories\UserRepositoryEloquent;

/**
 * Class UsersSystem.
 */
class UsersSystem implements UsersSystemContract
{
    /**
     * @var UserRepositoryEloquent
     */
    protected $userRepository;

    /**
     * @return UserRepositoryEloquent
     */
    public function getUserRepository(): UserRepositoryEloquent
    {
        if($this->userRepository && $this->userRepository instanceof UserRepositoryEloquent) {
            return $this->userRepository;
        } else {
            return $this->userRepository = app('App\Core\Repositories\UserRepository');
        }
    }

    /**
     * @param $data
     * @param null $id
     * @param array $with
     *
     * @return mixed
     */
    public function present($data, $id = null, array $with = [])
    {
        if ($id) {
            $users = $this->getUserRepository()->find($id);
        } else {
            if (!empty($with)) {
                $users = $this->getUserRepository()->with($with)->paginate();
            } else {
                $users = $this->getUserRepository()->paginate();
            }
        }

        return $users;
    }

    /**
     * @param array $data
     *
     * @return User
     */
    public function create(array $data): User
    {
        $role = $data['role'];
        $user = $this->getUserRepository()->create($data);
        if (is_array($role)) {
            $user->roles()->sync((array)$role);
        } else {
            $user->addRole($role);
        }

        return $user;
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return User
     */
    public function update(array $data, $id): User
    {
        $user = $this->getUserRepository()->findOrFail($id);
        $user->roles()->sync((array)$data['role']);
        $user = $this->getUserRepository()->update($data, $id);

        return $user;
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->getUserRepository()->delete($id);

        return $deleted;
    }
}
