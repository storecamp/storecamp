<?php

namespace App\Core\Presenters;

use App\Core\Transformers\LayoutTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class LayoutPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class LayoutPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LayoutTransformer();
    }
}
