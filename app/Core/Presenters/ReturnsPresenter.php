<?php

namespace App\Core\Presenters;

use App\Core\Transformers\ReturnsTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class ReturnPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class ReturnsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReturnsTransformer();
    }
}
