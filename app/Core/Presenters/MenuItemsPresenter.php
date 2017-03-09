<?php

namespace App\Core\Presenters;

use App\Core\Transformers\MenuItemsTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class MenuItemsPresenter
 *
 * @package namespace App\Core\Presenters;
 */
class MenuItemsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuItemsTransformer();
    }
}
