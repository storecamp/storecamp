<?php

namespace App\Core\Contracts;


/**
 * Interface AttributeGroupSystemContract
 * @package App\Core\Contracts
 */
interface AttributeGroupSystemContract
{
    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentGroup(array $data, $id = null, array $with = []);

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentDescription(array $data, $id = null, array $with = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function createGroup(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function createDescription(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateGroup(array $data, $id);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateDescription(array $data, $id);

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deleteGroup($id, array $data = []): int;

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deleteDescription($id, array $data = []): int;
}