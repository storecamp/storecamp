<?php

namespace App\Core\Transformers;

use App\Core\Models\Orders;
use League\Fractal\TransformerAbstract;

/**
 * Class OrdersTransformer.
 */
class OrdersTransformer extends TransformerAbstract
{
    /**
     * Transform the \Orders entity.
     *
     * @param \Orders $model
     *
     * @return array
     */
    public function transform(Orders $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
