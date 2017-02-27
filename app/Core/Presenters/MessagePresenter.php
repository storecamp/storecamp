<?php

namespace App\Core\Presenters;

use App\Core\Transformers\MessageTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class MessagePresenter
 *
 * @package namespace App\Core\Presenters;
 */
class MessagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MessageTransformer();
    }
}
