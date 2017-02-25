<?php

namespace App\Core\Logic;


use App\Core\Contracts\MediaSystemContract;
use App\Core\Models\Folder;
use App\Core\Repositories\FolderRepository;
use App\Core\Repositories\MediaRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Plank\Mediable\MediaUploader;

/**
 * Class MediaSystem
 * @package App\Core\Logic
 */
class MediaSystem implements MediaSystemContract
{
    /**
     * @var FolderRepository
     */
    public $folder;
    /**
     * @var MediaRepository
     */
    public $media;
    /**
     * @var mixed
     */
    public $defaultFolder;
    /**
     * @var string
     */
    public $disk = 'local';

    /**
     * @var \That0n3guy\Transliteration\Transliteration
     */
    private $transliteration;

    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var MediaUploader
     */
    private $mediaUploader;

    /**
     * MediaSystem constructor.
     * @param FolderRepository $folder
     * @param MediaRepository $media
     * @param Filesystem $filesystem
     * @param MediaUploader $mediaUploader
     */
    public function __construct(FolderRepository $folder, MediaRepository $media, Filesystem $filesystem, MediaUploader $mediaUploader)
    {
        $this->folder = $folder;
        $this->media = $media;
        $this->disk;
        $this->defaultFolder = $this->folder->disk('local')->first();
        $this->transliteration = new \That0n3guy\Transliteration\Transliteration();
        $this->filesystem = $filesystem;
        $this->mediaUploader = $mediaUploader;
    }

    /**
     * @return string
     */
    public function getDisk(): string
    {
        return $this->disk;
    }

    /**
     * @param string $disk
     */
    public function setDisk(string $disk)
    {
        $this->disk = $disk;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function disk(string $name)
    {
        if (!empty($name)) {
            $this->folder->setDisk($name);
            $this->setDisk($name);
        } else {
            $this->folder->setDisk($this->disk);
            $this->setDisk($this->disk);
        }
        return $this;
    }

    /**
     * @param $request
     * @param null $folder
     * @param null $tag
     * @param string $disk
     * @param bool $getAll
     * @param array $dataTypes
     * @return array
     */
    public function present($request, $folder = null, $tag = null, $disk = '', bool $getAll = false, array $dataTypes = [])
    {
        $this->setDisk($disk);
        $model = $this->media->getModel();
        $parentsPath = $this->folder->disk($disk)->getParentFoldersPath($folder);
        $folderPath = $parentsPath ? $parentsPath . '/' . $folder->name : $folder->name;
        $count = $folder->files->count();
        if ($getAll) {
            $this->media->setSkipPaginate(true);
        }
        if (!empty($dataTypes)) {
            $this->media->setDataTypes($dataTypes);
        }
        $media = $this->filesPreRender($model, $folderPath, $tag, $request, $folder, $disk);

        $directories = $folder->children;

        return [
            'directories' => $directories,
            'media' => $media,
            'count' => $count,
            'path' => $folder->name
        ];
    }

    /**
     * @param $request
     * @param string $disk
     * @return Folder
     */
    public function makeFolder($request, $disk = ''): Folder
    {
        $this->setDisk($disk);
        $new_path = $this->transliteration->clean_filename(trim($request->new_path));  // You can see I am cleaning the filename
        $folderDisk = $this->folder->disk($disk);
        $parentFolderId = $request->folder ? $request->folder : $this->folder->getDefaultFolder($disk)->unique_id;
        $parentFolder = $folderDisk->find($parentFolderId);
        $parentFoldersPath = $folderDisk->getParentFoldersPath($parentFolder);
        $parentPath = $parentFoldersPath ? $parentFoldersPath . '/' . $parentFolder->name : $parentFolder->name;
        $newFolder = $parentPath ? $folderDisk->getDiskRoot() . '/' . $parentPath . '/' . $new_path : $folderDisk->getDiskRoot() . '/' . $new_path;
        $newFolderPath = $parentPath ? $parentPath . '/' . $new_path : $new_path;
        if (!$this->filesystem->isDirectory($newFolder)) {
            $this->filesystem->makeDirectory($newFolder, 0775, true);
            $folder = $this->folder->getModel()->create([
                'name' => $new_path,
                'path_on_disk' => $newFolderPath,
                'parent_id' => $parentFolder->id,
                'disk' => $disk
            ]);
            return $folder;
        } else {
            return $this->folder->getDefaultFolder($disk);
        }
    }

    /**
     * @param Request $request
     * @param string $disk
     * @return \Plank\Mediable\Media
     */
    public function makeFile($request, $disk = '')
    {
        $this->setDisk($disk);
        $folderDisk = $this->folder->disk($disk);
        $folder = $request->folder ? $folderDisk->find($request->folder) : $this->defaultFolder;
        $parentFoldersPath = $folderDisk->getParentFoldersPath($folder);
        $folderPath = $parentFoldersPath ? $parentFoldersPath . '/' . $folder->name : $folder->name;
        $folderFullPath = $folderDisk->getDiskRoot() . '/' . $folderPath;
        $file = $request->file('file');
        $filename = $this->transliteration->clean_filename($file->getClientOriginalName());  // You can see I am cleaning the filename
        $media = $this->mediaUploader->fromSource($file)
            ->toDestination($folderDisk->getDisk(), $folderPath)->useFilename($filename)->upload();
        $media->directory = $folderPath;
        $media->directory_id = $folder->id;
        $media->save();
        return $media;
    }

    /**
     * @param Request $request
     * @param string $disk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function renameFolder($request, $disk = '')
    {
        $this->setDisk($disk);
        $new_name = $this->transliteration->clean_filename(trim($request->new_name));  // You can see I am cleaning the filename
        $folderDisk = $this->folder->disk($disk);

        $renameFolder = $folderDisk->find($request->folder);
        $parentFoldersPath = $folderDisk->getParentFoldersPath($renameFolder);
        $renamedPath = $parentFoldersPath ? $parentFoldersPath . '/' . $renameFolder->name : $renameFolder->name;
        $beRenamedToPath = $parentFoldersPath ? $parentFoldersPath . '/' . $new_name : $new_name;
        $selectedFolder = $folderDisk->getDiskRoot() . '/' . $renamedPath;
        $newFolder = $folderDisk->getDiskRoot() . '/' . $beRenamedToPath;

        if ($this->filesystem->isDirectory($selectedFolder)) {
            $medias = $this->media->inDirectory($folderDisk->getDisk(), $renamedPath);
            $renamed = $this->filesystem->move($selectedFolder, $newFolder);
            foreach ($medias as $media) {
                $media->directory = $beRenamedToPath;
                $media->save();
            }
            $renameFolder->name = $new_name;
            $renameFolder->path_on_disk = $beRenamedToPath;
            $renameFolder->save();
        }

        return $renameFolder;
    }

    /**
     * @param $request
     * @param string $disk
     * @return mixed
     * @throws \Exception
     */
    public function renameFile($request, $disk = '')
    {
        $this->setDisk($disk);
        $new_name = $this->transliteration->clean_filename(trim($request->new_name));  // You can see I am cleaning the filename
        $selected_id = trim($request->selected_id);
        $file = $this->media->find($selected_id);
        $folderDisk = $this->folder->disk($disk);
        $folderFile = $folderDisk->find($file->directory_id);
        $parentFoldersPath = $folderDisk->getParentFoldersPath($folderFile);

        $renamedPath = $parentFoldersPath ? $parentFoldersPath . '/' . $folderFile->name : $folderFile->name;
        $selectedFolder = $folderDisk->getDiskRoot() . '/' . $renamedPath;
        if ($this->filesystem->isDirectory($selectedFolder)) {
            if (!$this->filesystem->exists($selectedFolder . $file->filename . '.' . $file->extension)) {
                throw new \Exception("Sorry File not found", 404);
            }
            $this->filesystem->move($selectedFolder . $file->filename . '.' . $file->extension,
                $selectedFolder . $new_name . '.' . $file->extension);

            $file->filename = $new_name;
            $file->save();
        }
        return $folderFile;
    }

    /**
     * @param $request
     * @param $folder
     * @param $disk
     * @return void
     * @throws \Exception
     */
    public function folderDelete($request, $folder, $disk): void
    {
        $this->setDisk($disk);
        $deleted = $this->folder->disk($disk)->delete($folder);
        if (!$deleted) {
            throw new \Exception("Folder is not deleted", 500);
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function fileDelete($id)
    {
        $media = $this->media->find($id);
        $mediaClone = $media;
        $deleted = $this->media->delete($id);
        if (!$deleted) {
            throw new \Exception("Folder is not deleted", 500);
        }
        return $mediaClone;

    }

    /**
     * preRender files
     *
     * @param $model
     * @param string $path
     * @param string $tag
     * @param $request
     * @param $folder
     * @param string $disk
     * @return array
     */
    private function filesPreRender($model, $path = "", $tag = "", $request, $folder, $disk = '')
    {
        $folderInstance = $this->folder->disk($disk);
        if ($tag) {
            $media = $this->media->inDirectory($folderInstance->getDisk(), $path, $tag);

        } else {
            $media = $this->media->inDirectory($folderInstance->getDisk(), $path);
        }
        $media = ["media" => $media, "path" => $path, "tag" => $tag, "folderInstance" => $folder, 'disk' => $disk];
        return $media;
    }

}