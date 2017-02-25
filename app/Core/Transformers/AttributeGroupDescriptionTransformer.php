<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\AttributeGroupDescription;

/**
 * Class AttributeGroupDescriptionTransformer
 * @package namespace App\Core\Transformers;
 */
class AttributeGroupDescriptionTransformer extends TransformerAbstract
{

    /**
     * Transform the \AttributeGroupDescription entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
