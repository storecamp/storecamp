<?php

namespace App\Core\Contracts;


use App\Core\Models\Folder;

/**
 * Interface MediaSystemContract
 * @package App\Core\Contracts
 */
interface MediaSystemContract
{
    /**
     * @param string $name
     * @return mixed
     */
    public function disk(string $name);

    /**
     * @param $request
     * @param null $folder
     * @param null $tag
     * @param string $disk
     * @param bool $getAll
     * @param array $dataTypes
     * @return mixed
     */
    public function present($request, $folder = null, $tag = null, $disk = '', bool $getAll = false, array $dataTypes = []);

    /**
     * @param $request
     * @param string $disk
     * @return mixed
     */
    public function makeFolder($request, $disk = '') : Folder;
    /**
     * @param $request
     * @param string $disk
     */
    public function makeFile($request, $disk = '');

    /**
     * @param $request
     * @param string $disk
     * @return mixed
     */
    public function renameFolder($request, $disk = '');

    /**
     * @param $request
     * @param string $disk
     * @return mixed
     */
    public function renameFile($request, $disk = '');

    /**
     * @param $request
     * @param $folder
     * @param $disk
     * @return int
     */
    public function folderDelete($request, $folder, $disk);

    /**
     * @param $id
     * @return mixed
     */
    public function fileDelete($id);
}