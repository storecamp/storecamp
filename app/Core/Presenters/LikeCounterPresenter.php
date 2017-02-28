<?php

namespace App\Core\Presenters;

use App\Core\Transformers\LikeCounterTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class LikeCounterPresenter.
 */
class LikeCounterPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LikeCounterTransformer();
    }
}
