<?php namespace App\Core\Components\Messenger\Repositories;

interface Repository
{
    /**
     * Gets a record by an id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);
}
