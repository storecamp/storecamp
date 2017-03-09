<?php

namespace App\Core\Presenters;

use App\Core\Transformers\MenuTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class MenuPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class MenuPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuTransformer();
    }
}
