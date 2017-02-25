<?php

namespace App\Core\Contracts;


use App\Core\Models\User;

/**
 * Interface UsersSystemContract
 * @package App\Core\Contracts
 */
interface UsersSystemContract
{
    /**
     * @param $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present($data, $id = null, array $with = []);

    /**
     * @param $data
     * @return mixed
     */
    public function create(array $data) : User;

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id) : User;

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function delete($id, array $data = []) : int;
}