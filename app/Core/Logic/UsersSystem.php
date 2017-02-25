<?php


namespace App\Core\Logic;


use App\Core\Contracts\UsersSystemContract;
use App\Core\Models\User;
use App\Core\Repositories\RolesRepository;
use App\Core\Repositories\UserRepository;

/**
 * Class UsersSystem
 * @package App\Core\Logic
 */
class UsersSystem implements UsersSystemContract
{
    /**
     * @var UserRepository
     */
    public $userRepository;

    /**
     * @var RolesRepository
     */
    public $rolesRepository;

    /**
     * UsersSystem constructor.
     *
     * @param UserRepository $userRepository
     * @param RolesRepository $rolesRepository
     */
    public function __construct(UserRepository $userRepository, RolesRepository $rolesRepository)
    {
        $this->userRepository = $userRepository;
        $this->rolesRepository = $rolesRepository;
    }

    /**
     * @param $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present($data, $id = null, array $with = [])
    {
        if ($id) {
            $users = $this->userRepository->find($id);
        } else {
            if (!empty($with)) {
                $users = $this->userRepository->with($with)->paginate();
            } else {
                $users = $this->userRepository->paginate();
            }
        }
        return $users;
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data) : User
    {
        $role = $data['role'];
        $user = $this->userRepository->create($data);
        $user->addRole($role);
        return $user;
    }

    /**
     * @param array $data
     * @param $id
     * @return User
     */
    public function update(array $data, $id) : User
    {
        $user = $this->userRepository->update($data, $id);
        $user->roles()->sync((array)$data['role']);
        return $user;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function delete($id, array $data = []) : int
    {
        $deleted = $this->userRepository->delete($id);
        return $deleted;
    }
}