<?php

namespace App\Core\Presenters;

use App\Core\Transformers\SettingsTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class SettingsPresenter.
 */
class SettingsPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SettingsTransformer();
    }
}
