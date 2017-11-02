<?php

namespace App\Core\Logic;

use App\Core\Contracts\UsersSystemContract;
use App\Core\Models\User;

/**
 * Class UsersSystem.
 */
class UsersSystem implements UsersSystemContract
{
    /**
     * @var User
     */
    public $user;

    /**
     * UsersSystem constructor.
     */
    public function __construct()
    {
        $this->user = new User();
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
            $users = $this->user->find($id);
        } else {
            if (!empty($with)) {
                $users = $this->user->with($with)->paginate();
            } else {
                $users = $this->user->paginate();
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
        $user = $this->user->create($data);
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
     * @return User
     * @throws \Exception
     */
    public function update(array $data, $id): User
    {
        $user = $this->user->findOrFail($id);
        $user->roles()->sync((array)$data['role']);
        $updated = $user->update($data);

        if (!$updated) {
            throw new \Exception("User not deleted");
        }

        return $this->user->findOrFail($id);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->user->findOrFail($id)->delete();

        return $deleted;
    }
}
