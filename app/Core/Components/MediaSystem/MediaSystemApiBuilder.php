<?php

namespace App\Components\MediaSystem;

use App\Core\Models\Folder;
use App\Core\Models\Media;

class MediaSystemApiBuilder
{
    /**
     * @var Folder
     */
    protected $folder;
    /**
     * @var Media
     */
    protected $media;

    /**
     * MediaSystemBuilder constructor.
     *
     * @param $folder
     * @param $media
     */
    public function __construct(Folder $folder, Media $media)
    {
        $this->folder = $folder;
        $this->media = $media;
    }

    /**
     * @param $folder
     * @param string $disk
     * @param string $routeName
     * @param array $array
     *
     * @return array
     */
    public function getParentFoldersPathLinks($folder, string $disk, string $routeName = '', $array = []): array
    {
        if (empty($routeName)) {
            $routeName = 'api.media::index';
        }
        $disk = $this->folder->disk($disk);
        $array = $this->prepareParentFolderLinks($folder, $disk->getDisk(), $routeName);
        $item = [
            "folder_name" => $folder->name ? $folder->name : '../',
            "disk" => $disk->getDisk(),
            "folder_id" => $folder->unique_id,
            "class" => "active",
            "data-folder-url" => route($routeName, [$disk->getDisk(), $folder->unique_id])];
        array_push($array, $item);

        return $array;
    }

    /**
     * @param string $disk
     * @param string $routeName
     *
     * @return string
     */
    public function getDiskUrls(string $disk, string $routeName = '')
    {
        if (empty($routeName)) {
            $routeName = 'api.media::index';
        }
        $disk = $this->folder->disk($disk);
        $rootFolders = $disk->getDiskRoots();
        $diskUrls = [];
        foreach ($rootFolders as $key => $item) {
            $item = [
                "disk" => $item->disk,
                "folder_id" => $item->unique_id,
                "class" => $disk->getDisk() == $item->disk ? 'active btn btn-xs btn-default' : 'btn btn-xs btn-default',
                "folder_url" => route($routeName, [$item->disk, $item->unique_id])];
            array_unshift($diskUrls, $item);
        }

        return $diskUrls;
    }

    /**
     * @param $request
     * @param null $folder
     * @param $path
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function presentFolders($request, $folder, $path)
    {
        $directories = $folder->children;
        $disk = $folder->disk;

        return view('admin.media.folders-list', compact('directories', 'path', 'disk'));
    }

    /**
     * @param $folder
     * @param string $disk
     * @param string $routeName
     * @param array $array
     *
     * @return array
     */
    private function prepareParentFolderLinks($folder, string $disk, string $routeName, $array = [])
    {
        while ($folder->parent_id != null) {
            $newParent = $this->folder->find($folder->parent_id);
            $item = [
                "folder_name" => $newParent->name ? $newParent->name : '../',
                "disk" => $this->folder->disk($disk)->getDisk(),
                "folder_id" => $newParent->unique_id,
                "data-folder-url" => route($routeName, [$newParent->disk, $newParent->unique_id])
            ];
            array_unshift($array, $item);

            return $this->prepareParentFolderLinks($newParent, $disk, $routeName, $array);
        }

        return array_filter($array);
    }
}