<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Promocode;

/**
 * Class PromocodeTransformer
 * @package namespace App\Core\Transformers;
 */
class PromocodeTransformer extends TransformerAbstract
{

    /**
     * Transform the \Promocode entity
     * @param \Promocode $model
     *
     * @return array
     */
    public function transform(Promocode $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
