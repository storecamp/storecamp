<?php

namespace App\Core\Transformers;

use App\Core\Models\Currency;
use League\Fractal\TransformerAbstract;

/**
 * Class CurrencyTransformer.
 */
class CurrencyTransformer extends TransformerAbstract
{
    /**
     * Transform the \Currency entity.
     *
     * @param \Currency $model
     *
     * @return array
     */
    public function transform(Currency $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
