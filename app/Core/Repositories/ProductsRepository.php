<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductsRepository.
 */
interface ProductsRepository extends RepositoryInterface
{
    public function getModel();
}
