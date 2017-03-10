<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface MenuItemsRepository
 * @package namespace App\Core\Repositories;
 */
interface MenuItemsRepository extends RepositoryInterface
{
    public function createOrFirst(array $params);

}
