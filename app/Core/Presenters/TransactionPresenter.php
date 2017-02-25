<?php

namespace App\Core\Presenters;

use App\Core\Transformers\TransactionTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class TransactionPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class TransactionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransactionTransformer();
    }
}
