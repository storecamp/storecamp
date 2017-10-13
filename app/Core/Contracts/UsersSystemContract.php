<?php

namespace App\Core\Contracts;

use App\Core\Models\User;
use App\Core\Repositories\RolesRepositoryEloquent;
use App\Core\Repositories\UserRepositoryEloquent;

/**
 * Interface UsersSystemContract.
 */
interface UsersSystemContract
{
    /**
     * @return UserRepositoryEloquent
     */
    public function getUserRepository(): UserRepositoryEloquent;

    /**
     * @param $data
     * @param null  $id
     * @param array $with
     *
     * @return mixed
     */
    public function present($data, $id = null, array $with = []);

    /**
     * @param $data
     *
     * @return mixed
     */
    public function create(array $data) : User;

    /**
     * @param $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id) : User;

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function delete($id, array $data = []) : int;
}
