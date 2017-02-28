<?php

namespace App\Core\Presenters;

use App\Core\Transformers\ReturnsTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class ReturnPresenter.
 */
class ReturnsPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReturnsTransformer();
    }
}
