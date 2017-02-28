<?php

namespace RepositoryLab\Repository\Transformer;

use League\Fractal\TransformerAbstract;
use RepositoryLab\Repository\Contracts\Transformable;

/**
 * Class ModelTransformer.
 */
class ModelTransformer extends TransformerAbstract
{
    public function transform(Transformable $model)
    {
        return $model->transform();
    }
}
