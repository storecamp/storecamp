<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface MediaRepository.
 */
interface MediaRepository extends RepositoryInterface
{
    public function inDirectory($disk, $directory, $tag = null, $recursive = false);
}
