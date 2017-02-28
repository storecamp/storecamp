<?php

namespace App\Core\Presenters;

use App\Core\Transformers\LayoutTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class LayoutPresenter.
 */
class LayoutPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LayoutTransformer();
    }
}
