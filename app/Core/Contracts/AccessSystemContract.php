<?php

namespace App\Core\Contracts;

interface AccessSystemContract
{

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentRoles(array $data, $id = null, array $with = []);

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function presentPermissions(array $data, $id = null, array $with = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function createRole(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function createPermission(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateRole(array $data, $id);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updatePermission(array $data, $id);

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deleteRole($id, array $data = []): int;

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function deletePermission($id, array $data = []): int;

}