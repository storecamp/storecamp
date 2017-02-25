<?php

namespace App\Core\Presenters;

use App\Core\Transformers\BannerTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class BannerPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class BannerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BannerTransformer();
    }
}
