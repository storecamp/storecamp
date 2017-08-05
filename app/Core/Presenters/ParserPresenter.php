<?php

namespace App\Core\Presenters;

use App\Core\Transformers\ParserTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class ParserPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class ParserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ParserTransformer();
    }
}
