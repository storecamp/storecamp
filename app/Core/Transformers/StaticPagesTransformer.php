<?php

namespace App\Core\Transformers;

use App\Core\Models\Pages;
use League\Fractal\TransformerAbstract;

/**
 * Class StaticPagesTransformer.
 */
class StaticPagesTransformer extends TransformerAbstract
{
    /**
     * Transform the \StaticPages entity.
     *
     * @param Pages $model
     *
     * @return array
     */
    public function transform(Pages $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
