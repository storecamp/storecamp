<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface MenuItemsRepository.
 */
interface MenuItemsRepository extends RepositoryInterface
{
    public function createOrFirst(array $params);
}
