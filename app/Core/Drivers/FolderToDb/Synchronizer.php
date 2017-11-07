<?php

namespace App\Core\Drivers\FolderToDb;

use App\Core\Models\Folder;
use App\Core\Repositories\MediaRepository;

/**
 * Class Synchronizer.
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
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $file;

    /**
     * Synchronizer constructor.
     *
     * @param MediaRepository $media
     * @param Folder $folder
     * @param \Illuminate\Filesystem\Filesystem $file
     */
    public function __construct(MediaRepository $media, Folder $folder, \Illuminate\Filesystem\Filesystem $file)
    {
        $this->folder = $folder;
        $this->media = $media;
        $this->file = $file;
    }

    /**
     * synchronize folders  with
     * folder structure.
     *
     * @param string $path
     * @param string $disk
     */
    public function synchronize(string $path, $disk = 'local')
    {
        $rootFolder = $this->resolveRootFolder($disk, $path);
        $directories = $this->directoriesIterate($path, true);
        foreach ($directories as $key => $dir) {
            $folderPath = $dir['folderPath'];
            echo $folderPath . 'on disk - ' . $disk . "\n";
            $folders = explode('/', $folderPath);
            if (count($folders) > 1) {
                array_pop($folders);
                $newFolderPath = implode('/', $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                if ($folderParentInstance->parent_id == null) {
                    $folderParentInstance->parent_id = $rootFolder->id;
                    $folderParentInstance->save();
                }
                $newFolder = $this->findOrCreateByFolderPath($folderPath, $disk);
                $newFolder->parent_id = $folderParentInstance->id;
                $newFolder->save();
            } else {
                $newFolderPath = implode('/', $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                $folderParentInstance->parent_id = $rootFolder->id;
                $folderParentInstance->save();
            }
        }
    }

    /**
     * @param string $root
     * @param bool $withFolderName
     *
     * @return array
     */
    public function directoriesIterate(string $root, bool $withFolderName = false): array
    {
        $flags = \FilesystemIterator::KEY_AS_PATHNAME | \FilesystemIterator::CURRENT_AS_FILEINFO | \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::UNIX_PATHS;
        $iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, $flags),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
        );
        $paths = [$root];
        foreach ($iter as $path => $dir) {
            if ($dir->isDir()) {
                $paths[] = $path;
            }
        }
        $items = [];
        foreach ($paths as $key => $item) {
            $folderPath = explode('/', implode('', explode($paths[0], $item)));
            unset($folderPath[0]);
            $folderPath = implode('/', $folderPath);

            if ($withFolderName) {
                $folderName = explode('/', $folderPath);
                $folderName = explode('/', $folderName[count($folderName) - 1]);
                if ($key == 0) {
                    if (!empty(implode('', explode($paths[0], $item)))) {
                        $items[$key]['folderPath'] = $folderPath;
                        $items[$key]['folderName'] = $folderName[0];
                    }
                } else {
                    $items[$key]['folderPath'] = $folderPath;
                    $items[$key]['folderName'] = $folderName[0];
                }
            } else {
                if ($key == 0) {
                    if (!empty(implode('', explode($paths[0], $item)))) {
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
     * @param null|string $folderPath
     * @param string $disk
     *
     * @return Folder
     */
    public function findOrCreateByFolderPath(?string $folderPath, $disk = 'local'): Folder
    {
        if (empty($folderPath)) {
            $folderPath = null;
        }
        $folder = $this->folder->disk($disk)->where('path_on_disk', $folderPath)->where('disk', $disk);
        if ($folder->count() > 0) {
            return $folder->first();
        } else {
            $folderName = explode('/', $folderPath);
            $folderName = $folderName[count($folderName) - 1];

            return $this->folder->create(['name' => $folderName, 'path_on_disk' => $folderPath, 'disk' => $disk]);
        }
    }

    /**
     * @param string $disk
     * @param string $root
     *
     * @return Folder
     */
    private function resolveRootFolder($disk = 'local', $root = ''): Folder
    {
        if (!empty($root) && !$this->file->isDirectory($root)) {
            $this->file->makeDirectory($root);
        }
        $rootFolder = $this->folder->findWhere([
            ['disk', '=', $disk],
            ['name', '=', ''],
            ['path_on_disk', '=', null],
        ]);
        if ($rootFolder->count() == 0) {
            return $rootFolder = $this->folder->create([
                'name' => '',
                'parent_id' => null,
                'disk' => $disk,
            ]);
        } else {
            return $rootFolder = $rootFolder->first();
        }
    }

    /**
     * synchronize folders  with.
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
            $folderPath = $dir['folderPath'];
            echo $folderPath . ' on disk - ' . $disk . "\n";
            $folders = explode('/', $folderPath);
            if (count($folders) > 1) {
                array_pop($folders);
                $newFolderPath = implode('/', $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                if ($folderParentInstance->parent_id == null) {
                    $folderParentInstance->parent_id = $rootFolder->id;
                    $folderParentInstance->save();
                }
                $newFolder = $this->findOrCreateByFolderPath($folderPath, $disk);
                $newFolder->parent_id = $folderParentInstance->id;
                $newFolder->save();
                $iter = 0;
                $filePath = $this->folder->disk($disk)->getDiskRoot() ? $this->folder->disk($disk)->getDiskRoot() . '/' . $newFolder->path_on_disk : $newFolder->path_on_disk;
                foreach ($this->file->files($filePath) as $file) {
                    $iter++;
                    $fileName = $this->file->basename($file);
                    $fileNameClean = explode('.', $fileName);
                    array_pop($fileNameClean);
                    $newFolderPath = $newFolder->path_on_disk ?? null;
                    $mediaFile = $this->media->findWhere([
                        ['directory', '=', $newFolderPath],
                        ['filename', '=', implode('', $fileNameClean)],
                        ['disk', '=', $disk],
                    ]);
                    if ($mediaFile->count() == 0) {
                        $newFolderPath = $newFolder->path_on_disk ? $newFolder->path_on_disk . '/' . $fileName : $fileName;
                        $media = \MediaUploader::importPath($disk, $newFolderPath);
                        $media->directory_id = $newFolder->id;
                        $media->save();
                    }
                }
            } else {
                $newFolderPath = implode('/', $folders);
                $folderParentInstance = $this->findOrCreateByFolderPath($newFolderPath, $disk);
                $folderParentInstance->parent_id = $rootFolder->id;
                $folderParentInstance->save();
                $manageFilesPath = $this->folder->disk($disk)->getDiskRoot() ? $this->folder->disk($disk)->getDiskRoot() . '/' . $folderParentInstance->path_on_disk : $folderParentInstance->path_on_disk;
                foreach ($this->file->files($manageFilesPath) as $file) {
                    $fileName = $this->file->basename($file);
                    $fileNameClean = explode('.', $fileName);
                    array_pop($fileNameClean);
                    $folderParentInstancePath = $folderParentInstance->path_on_disk ?? null;
                    $mediaFile = $this->media->findWhere([
                        ['directory', '=', $folderParentInstancePath],
                        ['filename', '=', $fileNameClean],
                        ['disk', '=', $disk],
                    ]);
                    if ($mediaFile->count() == 0) {
                        $manageRootPath = $folderParentInstancePath ? $folderParentInstancePath . '/' . $fileName : $fileName;
                        $media = \MediaUploader::importPath($disk, $manageRootPath);
                        $media->directory_id = $folderParentInstance->id;
                        $media->save();
                    }
                }
            }
        }
        $this->rootFolderFilesSearch($path, $disk);
    }

    /**
     * @param $root
     * @param $disk
     */
    private function rootFolderFilesSearch($root, $disk)
    {
        $rootFolder = $this->resolveRootFolder($disk);
        foreach ($this->file->files($root) as $file) {
            $fileName = $this->file->basename($file);
            $fileNameClean = explode('.', $fileName);
            array_pop($fileNameClean);
            $mediaFile = $this->media->findWhere([
                ['directory', '=', ''],
                ['filename', '=', implode('', $fileNameClean)],
                ['disk', '=', $disk],]);
            if ($mediaFile->count() == 0) {
                $manageRootPath = $rootFolder->path_on_disk ? $rootFolder->path_on_disk . '/' . $fileName : $fileName;
                $media = \MediaUploader::importPath($disk, $manageRootPath);
                $media->directory_id = $rootFolder->id;
                $media->save();
            }
        }
    }

    /**
     * @param $folder
     * @param $disk
     */
    public function byFolderFilesSync($folder, $disk)
    {
        $rootFolder = $this->resolveRootFolder($disk);
        foreach ($this->file->files($folder) as $file) {
            $fileName = $this->file->basename($file);
            $fileNameClean = explode('.', $fileName);
            array_pop($fileNameClean);
            $mediaFile = $this->media->findWhere([
                ['directory', '=', ''],
                ['filename', '=', implode('', $fileNameClean)],
                ['disk', '=', $disk],]);
            if ($mediaFile->count() == 0) {
                $manageRootPath = $rootFolder->path_on_disk ? $rootFolder->path_on_disk . '/' . $fileName : $fileName;
                $media = \MediaUploader::importPath($disk, $manageRootPath);
                $media->directory_id = $rootFolder->id;
                $media->save();
            }
        }
    }

    /**
     * @param string $root
     * @param string $format
     * @param bool $skipFormatEnding
     *
     * @return array
     */
    public function getFilesByFormat(string $root, string $format, bool $skipFormatEnding = false): array
    {
        $flags = \FilesystemIterator::KEY_AS_PATHNAME | \FilesystemIterator::CURRENT_AS_FILEINFO | \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::UNIX_PATHS;
        $Directory = new \RecursiveDirectoryIterator($root, $flags);
        $Iterator = new \RecursiveIteratorIterator($Directory,
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD);
        $Regex = new \RegexIterator($Iterator, '/^.+\.' . $format . '$/i', \RecursiveRegexIterator::GET_MATCH);
        $files = [];
        foreach ($Regex as $file) {
            if ($skipFormatEnding) {
                $files[] = explode('.' . $format, basename($file[0]))[0];
            } else {
                $files[] = basename($file[0]);
            }
        }

        return $files;
    }
}
