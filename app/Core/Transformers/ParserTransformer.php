<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Parser;

/**
 * Class ParserTransformer
 * @package namespace App\Core\Transformers;
 */
class ParserTransformer extends TransformerAbstract
{

    /**
     * Transform the \Parser entity
     * @param \Parser $model
     *
     * @return array
     */
    public function transform(Parser $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
