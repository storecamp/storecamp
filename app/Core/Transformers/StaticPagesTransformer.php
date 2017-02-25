<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\StaticPages;

/**
 * Class StaticPagesTransformer
 * @package namespace App\Core\Transformers;
 */
class StaticPagesTransformer extends TransformerAbstract
{

    /**
     * Transform the \StaticPages entity
     * @param \StaticPages $model
     *
     * @return array
     */
    public function transform(StaticPages $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
