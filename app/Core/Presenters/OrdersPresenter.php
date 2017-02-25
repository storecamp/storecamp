<?php

namespace App\Core\Presenters;

use App\\Core\Transformers\OrdersTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class OrdersPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class OrdersPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrdersTransformer();
    }
}
