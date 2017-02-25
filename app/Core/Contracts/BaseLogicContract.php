<?php

namespace App\Core\Contracts;


interface BaseLogicContract
{
    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function delete($id, array $data = []): int;
}