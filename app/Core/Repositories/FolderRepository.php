<?php

namespace App\Core\Repositories;

use App\Core\Models\Folder;
use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface FolderRepository
 * @package namespace App\Core\Repositories;
 */
interface FolderRepository extends RepositoryInterface
{
    public function disk(string $name) : FolderRepositoryEloquent;
    public function getDefaultFolder($disk, $folder = null);
    public function getParentFoldersPath($folder, array $array = []);
}
