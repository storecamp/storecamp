<?php


namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

interface RolesRepository extends RepositoryInterface {

    public function renew($data, $dataPerm, $role);
    public function store(array $data);
    public function getRoleUsers(string $name);
}