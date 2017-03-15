<?php

namespace App\Core\Transformers;

use App\Core\Models\AttributeGroup;
use League\Fractal\TransformerAbstract;

/**
 * Class AttributeGroupTransformer.
 */
class AttributeGroupTransformer extends TransformerAbstract
{
    /**
     * Transform the \AttributeGroup entity.
     *
     * @param \AttributeGroup $model
     *
     * @return array
     */
    public function transform(AttributeGroup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
