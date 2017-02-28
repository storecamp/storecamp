<?php

namespace App\Core\Transformers;

use App\Core\Models\Returns;
use League\Fractal\TransformerAbstract;

/**
 * Class ReturnTransformer.
 */
class ReturnsTransformer extends TransformerAbstract
{
    /**
     * Transform the \Returns entity.
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
            'updated_at' => $model->updated_at,
        ];
    }
}
