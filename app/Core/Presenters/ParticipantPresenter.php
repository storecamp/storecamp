<?php

namespace App\Core\Presenters;

use App\Core\Transformers\ParticipantTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class ParticipantPresenter.
 */
class ParticipantPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ParticipantTransformer();
    }
}
