<?php

namespace App\Core\Support\Media;


class UploadedFileAdapter extends \Plank\Mediable\SourceAdapters\UploadedFileAdapter
{

    public function getRealPath() {
        return $this->source->getRealPath();
    }

    public function getHashName() {
        return $this->source->getHashName();
    }

}