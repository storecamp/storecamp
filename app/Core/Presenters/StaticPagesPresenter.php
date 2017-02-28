<?php

namespace App\Core\Presenters;

use App\Core\Transformers\StaticPagesTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class StaticPagesPresenter.
 */
class StaticPagesPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StaticPagesTransformer();
    }
}
