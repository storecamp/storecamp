<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface FolderRepository.
 */
interface FolderRepository extends RepositoryInterface
{
    public function disk(string $name) : FolderRepositoryEloquent;

    public function getDefaultFolder($disk, $folder = null);

    public function getParentFoldersPath($folder, array $array = []);
}
