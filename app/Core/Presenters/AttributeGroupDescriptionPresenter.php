<?php

namespace App\Core\Presenters;

use App\Core\Transformers\AttributeGroupDescriptionTransformer;
use RepositoryLab\Repository\Presenter\FractalPresenter;

/**
 * Class AttributeGroupDescriptionPresenter.
 */
class AttributeGroupDescriptionPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AttributeGroupDescriptionTransformer();
    }
}
