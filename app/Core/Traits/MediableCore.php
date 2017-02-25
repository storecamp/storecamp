<?php

namespace App\Core\Traits;

use App\Core\Models\Media;

/**
 * Class MediableCore
 * @package App\Core\Traits
 */
trait MediableCore
{

    /**
     * @param $model
     * @param string $selectedFiles
     * @param string $tag
     */
    private function attachMediaFiles($model, string $selectedFiles, string $tag)
    {
        if (!empty($selectedFiles)) {
            foreach (explode(",", $selectedFiles) as $item) {
                $model->attachMedia(Media::find($item), $tag);
            }
        }
    }

    /**
     * @param $model
     * @param string $selectedFiles
     * @param string $tag
     */
    private function syncMediaFiles($model, string $selectedFiles, string $tag)
    {
        if (!empty($selectedFiles)) {
            $model->detachMediaTags($tag);
            $this->attachMediaFiles($model, $selectedFiles, $tag);
        } else {
            $model->detachMediaTags($tag);
        }
    }

    /**
     * @param $model
     * @param string $selectedFile
     * @param string $tag
     */
    private function syncMediaFile($model, string $selectedFile, string $tag)
    {
        if (!empty($selectedFile)) {
            $model->detachMediaTags($tag);
            $selectedFile = explode(",", $selectedFile);
            $model->attachMedia(Media::findOrFail($selectedFile[0]), $tag);
        } else {
            $model->detachMediaTags($tag);
        }
    }
}