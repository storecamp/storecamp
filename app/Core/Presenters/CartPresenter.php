<?php

namespace App\Core\Presenters;

use App\Core\Transformers\CartTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class CartPresenter.
 */
class CartPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CartTransformer();
    }
}
