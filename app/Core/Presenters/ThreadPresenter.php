<?php

namespace App\Core\Presenters;

use App\Core\Transformers\ThreadTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class ThreadPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class ThreadPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ThreadTransformer();
    }
}
