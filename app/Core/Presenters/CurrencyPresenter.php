<?php

namespace App\Core\Presenters;

use App\Core\Transformers\CurrencyTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class CurrencyPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class CurrencyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CurrencyTransformer();
    }
}
