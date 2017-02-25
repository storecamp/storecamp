<?php

namespace App\Drivers\FolderToDb;


use App\Core\Models\Folder;
use App\Core\Models\Media;
use App\Core\Repositories\FolderRepository;
use App\Core\Repositories\MediaRepository;

/**
 * Class Synchronizer
 * @package App\Drivers\FolderToDb
 */
class Synchronizer implements SynchronizerInterface
{
    /**
     * @var Folder
     */
    protected $folder;
    /**
     * @var MediaRepository
     */
    protected $media;

    /**
     * Synchronizer constructor.
     * @param MediaRepository $media
     * @param FolderRepository $folder
     */
    public function __construct(MediaRepository $media, FolderRepository $folder)
    {
        $this->folder = $folder;
        $this->media = $media;
    }

    /**
     * @param string $folderPath
     * @param string $disk
     * @return Folder
     */
    public function findOrCreateByFolderPath(string $folderPath, $disk = 'local'): Folder
    {
        $folder = $this->folder->disk($disk)->where("path_on_disk", $folderPath)->where('disk', $disk);
        if ($folder->count() > 0) {
            return $folder->first();
        } else {
            $folderName = explode("/", $folderPath);
            $folderName = $folderName[count($folderName) - 1];
            return $this->folder->create(['name' => $folderName, "path_on_disk" => $folderPath, "disk" => $disk]);
        }
    }

    /**
     * synchronize folders  with
     * folder structure
     *
     * @param string $path
     * @param string $disk
     */
    public function synchronize(string $path, $disk = 'local')
    {
        $rootFolder = $this->resolveRootFolder($disk, $path);
        $directories = $this->directoriesIterate($path, true);
        foreach ($directories as $key => $dir) {
            $folderPath = $dir["folderPath"];
            echo $folderPath . "on disk - " . $disk . "\n";
            $folders = explode("/", $folderPath);
            if (count($folders) > 1) {
                array_pop($folders);
                $newFolderPath = implode("/", $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                if ($folderParentInstance->parent_id == null) {

                    $folderParentInstance->parent_id = $rootFolder->id;
                    $folderParentInstance->save();
                }
                $newFolder = $this->findOrCreateByFolderPath($folderPath, $disk);
                $newFolder->parent_id = $folderParentInstance->id;
                $newFolder->save();
            } else {
                $newFolderPath = implode("/", $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                $folderParentInstance->parent_id = $rootFolder->id;;
                $folderParentInstance->save();
            }
        }
    }

    /**
     * synchronize folders  with
     *
     * folder structure
     *
     * @param string $path
     * @param string $disk
     */
    public function synchronizeWithFiles(string $path, $disk = 'local')
    {
        $rootFolder = $this->resolveRootFolder($disk, $path);
        $directories = $this->directoriesIterate($path, true);
        foreach ($directories as $key => $dir) {
            $folderPath = $dir["folderPath"];
            echo $folderPath . " on disk - " . $disk . "\n";
            $folders = explode("/", $folderPath);
            if (count($folders) > 1) {
                array_pop($folders);
                $newFolderPath = implode("/", $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                if ($folderParentInstance->parent_id == null) {
                    $folderParentInstance->parent_id = $rootFolder->id;
                    $folderParentInstance->save();
                }
                $newFolder = $this->findOrCreateByFolderPath($folderPath, $disk);
                $newFolder->parent_id = $folderParentInstance->id;
                $newFolder->save();
                $iter = 0;
                foreach (\File::files($this->folder->disk($disk)->getDiskRoot() . '/' . $newFolder->path_on_disk) as $file) {
                    $iter++;
                    $fileName = \File::basename($file);
                    $fileNameClean = explode(".", $fileName);
                    array_pop($fileNameClean);
                    $mediaFile = $this->media->findWhere([
                        ["directory", '=', $newFolder->path_on_disk],
                        ["filename", '=', implode("", $fileNameClean)],
                        ['disk', '=', $disk]
                    ]);
                    if ($mediaFile->count() == 0) {
                        $media = \MediaUploader::importPath($disk, $newFolder->path_on_disk . "/" . $fileName);
                        $media->directory_id = $newFolder->id;
                        $media->save();

                    }
                }
            } else {
                $newFolderPath = implode("/", $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                $folderParentInstance->parent_id = $rootFolder->id;
                $folderParentInstance->save();
                foreach (\File::files($this->folder->disk($disk)->getDiskRoot() . "/" . $folderParentInstance->path_on_disk) as $file) {
                    $fileName = \File::basename($file);
                    $fileNameClean = explode(".", $fileName);
                    array_pop($fileNameClean);
                    $mediaFile = $this->media->findWhere([
                        ["directory", '=', $folderParentInstance->path_on_disk],
                        ["filename", '=', $fileNameClean],
                        ['disk', '=', $disk]
                    ]);
                    if ($mediaFile->count() == 0) {
                        $media = \MediaUploader::importPath($disk, $folderParentInstance->path_on_disk . "/" . $fileName);
                        $media->directory_id = $folderParentInstance->id;
                        $media->save();
                    }
                }
            }
        }
        $this->rootFolderFilesSearch($path, $disk);
    }

    /**
     * @param string $root
     * @param bool $withFolderName
     * @return array
     */
    public function directoriesIterate(string $root, bool $withFolderName = false): array
    {
        $iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
        );
        $paths = array($root);
        foreach ($iter as $path => $dir) {
            if ($dir->isDir()) {
                $paths[] = $path;
            }
        }
        $items = [];
        foreach ($paths as $key => $item) {

            $folderPath = explode("/", implode("", explode($paths[0], $item)));
            unset($folderPath[0]);
            $folderPath = implode("/", $folderPath);

            if ($withFolderName) {

                $folderName = explode("/", $folderPath);
                $folderName = explode("/", $folderName[count($folderName) - 1]);
                if ($key == 0) {
                    if (!empty(implode("", explode($paths[0], $item)))) {
                        $items[$key]["folderPath"] = $folderPath;
                        $items[$key]["folderName"] = $folderName[0];
                    }
                } else {

                    $items[$key]["folderPath"] = $folderPath;
                    $items[$key]["folderName"] = $folderName[0];
                }
            } else {
                if ($key == 0) {
                    if (!empty(implode("", explode($paths[0], $item)))) {
                        $items[] = $folderPath;
                    }
                } else {
                    $items[] = $folderPath;
                }
            }

        }
        return $items;
    }

    /**
     * @param $root
     * @param $disk
     */
    private function rootFolderFilesSearch($root, $disk)
    {
        $rootFolder = $this->resolveRootFolder($disk);
        foreach (\File::files($root) as $file) {
            $fileName = \File::basename($file);
            $fileNameClean = explode(".", $fileName);
            array_pop($fileNameClean);
            $mediaFile = $this->media->findWhere([
                ["directory", '=', ''],
                ["filename", '=', implode("", $fileNameClean)],
                ['disk', '=', $disk]]);
            if ($mediaFile->count() == 0) {
                $media = \MediaUploader::importPath($disk, $rootFolder->path_on_disk . "/" . $fileName);
                $media->directory_id = $rootFolder->id;
                $media->save();
            }
        }
    }

    /**
     * @param string $disk
     * @param string $root
     * @return Folder
     */
    private function resolveRootFolder($disk = 'local', $root = ''): Folder
    {
        if (!empty($root) && !\File::isDirectory($root))
        {
            \File::makeDirectory($root);
        }
        $rootFolder = $this->folder->findWhere([
            ['disk', '=', $disk],
            ["name", '=', ""],
            ["path_on_disk", '=', null]
        ]);
        if ($rootFolder->count() == 0) {
            return $rootFolder = \App\Core\Models\Folder::create([
                'name' => '',
                'parent_id' => null,
                'disk' => $disk
            ]);
        } else {
            return $rootFolder = $rootFolder->first();
        }
    }
}