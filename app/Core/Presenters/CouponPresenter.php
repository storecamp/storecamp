<?php

namespace App\Core\Presenters;

use App\Core\Transformers\CouponTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class CouponPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class CouponPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CouponTransformer();
    }
}
