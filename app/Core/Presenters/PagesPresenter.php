<?php

namespace App\Core\Presenters;

use App\Core\Transformers\PagesTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class PagesPresenter.
 */
class PagesPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PagesTransformer();
    }
}
