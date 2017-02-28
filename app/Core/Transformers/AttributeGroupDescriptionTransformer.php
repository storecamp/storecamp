<?php

namespace App\Core\Transformers;

use App\Core\Models\AttributeGroupDescription;
use League\Fractal\TransformerAbstract;

/**
 * Class AttributeGroupDescriptionTransformer.
 */
class AttributeGroupDescriptionTransformer extends TransformerAbstract
{
    /**
     * Transform the \AttributeGroupDescription entity.
     * @param \AttributeGroupDescription $model
     *
     * @return array
     */
    public function transform(AttributeGroupDescription $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
