<?php

namespace App\Drivers\FolderToDb;

use App\Core\Models\Folder;

/**
 * Interface SynchronizerInterface
 * @package App\Drivers\FolderToDb
 */
interface SynchronizerInterface {

    /**
     * @param string $folderPath
     * @param string $disk
     * @return Folder
     */
    public function findOrCreateByFolderPath(string $folderPath, $disk = 'local') : Folder ;

    /**
     * @param string $path
     * @param string $disk
     */
    public function synchronize(string $path, $disk = 'local');

    /**
     * @param string $path
     * @param string $disk
     */
    public function synchronizeWithFiles(string $path, $disk = 'local');

    /**
     * @param string $root
     * @param bool $withFolderName
     * @return array
     */
    public function directoriesIterate(string $root, bool $withFolderName = false ) : array;

}