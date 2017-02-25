<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\AttributeGroup;

/**
 * Class AttributeGroupTransformer
 * @package namespace App\Core\Transformers;
 */
class AttributeGroupTransformer extends TransformerAbstract
{

    /**
     * Transform the \AttributeGroup entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
