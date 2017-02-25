<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Returns;

/**
 * Class ReturnTransformer
 * @package namespace App\Core\Transformers;
 */
class ReturnsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Returns entity
     * @param \Returns $model
     *
     * @return array
     */
    public function transform(Returns $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
