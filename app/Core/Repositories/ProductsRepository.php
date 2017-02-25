<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;
/**
 * Interface ProductsRepository
 * @package namespace App\Core\Repositories;
 */
interface ProductsRepository extends RepositoryInterface
{
    public function getModel();

}
