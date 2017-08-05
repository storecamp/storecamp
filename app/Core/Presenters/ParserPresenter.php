<?php

namespace App\Core\Presenters;

use App\Core\Transformers\ParserTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class ParserPresenter.
 */
class ParserPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ParserTransformer();
    }
}
