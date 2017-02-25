<?php

namespace App\Components\MediaSystem;

use App\Core\Models\Folder;
use App\Core\Repositories\FolderRepository;
use App\Core\Repositories\MediaRepository;

class MediaSystemBuilder
{
    protected $folder;
    protected $media;

    /**
     * MediaSystemBuilder constructor.
     * @param $folder
     * @param $media
     */
    public function __construct(FolderRepository $folder, MediaRepository $media)
    {
        $this->folder = $folder;
        $this->media = $media;
    }

    /**
     * @param $folder
     * @param string $disk
     * @param string $routeName
     * @param array $array
     * @return string
     */
    public function getParentFoldersPathLinks($folder, string $disk, string $routeName = "", $array = [])
    {
        if(empty($routeName)) {
            $routeName = "admin::media::index";
        }
        $disk = $this->folder->disk($disk);
        $array = $this->prepareParentFolderLinks($folder, $disk->getDisk(), $routeName);
        $item = link_to_route($routeName, $folder->name ? $folder->name : "../", [$disk->getDisk(), $folder->unique_id],
            ["class" => "active", "style" => "margin-left: 10px", "data-folder-id" => $folder->unique_id,
                "data-folder-url" => route($routeName, [$disk->getDisk(), $folder->unique_id])]);
        array_push($array, $item);

        return implode("", $array);
    }

    /**
     * @param string $disk
     * @param string $routeName
     * @return string
     */
    public function getDiskUrls(string $disk, string $routeName = "")
    {
        if(empty($routeName)) {
            $routeName = "admin::media::index";
        }
        $disk = $this->folder->disk($disk);
        $rootFolders = $disk->getDiskRoots();
        $diskUrls = [];
        foreach ($rootFolders as $key => $item) {
            $item = link_to_route($routeName, $item->disk,
                [$item->disk, $item->unique_id],
                ["style" => "margin-left: 10px", "class" => $disk->getDisk() == $item->disk ? "active btn btn-xs btn-default" : "btn btn-xs btn-default",
                    "data-folder-id" => $item->unique_id,
                    "data-folder-url" => route($routeName, [$item->disk, $item->unique_id])
                ]);
            array_unshift($diskUrls, $item);
        }
        return implode("", $diskUrls);
    }

    /**
     * @param $request
     * @param null $folder
     * @param $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function presentFolders($request, $folder = null, $path)
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
     * @return array
     */
    private function prepareParentFolderLinks($folder, string $disk, string $routeName, $array = [])
    {
        while ($folder->parent_id != null) {
            $newParent = $this->folder->find($folder->parent_id);
            $item = link_to_route($routeName, $newParent->name ? $newParent->name : "../",
                [$this->folder->disk($disk)->getDisk(), $newParent->unique_id],
                ["style" => "margin-left: 10px",
                    "data-folder-id" => $newParent->unique_id,
                    "data-folder-url" => route($routeName, [$newParent->disk, $newParent->unique_id])
                ]);
            array_unshift($array, $item);
            return $this->prepareParentFolderLinks($newParent, $disk, $routeName, $array);
        }
        return array_filter($array);
    }
}