<?php

namespace App\Core\Presenters;

use App\Core\Transformers\PromocodeTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class PromocodePresenter.
 */
class PromocodePresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PromocodeTransformer();
    }
}
