<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Transaction;

/**
 * Class TransactionTransformer
 * @package namespace App\Core\Transformers;
 */
class TransactionTransformer extends TransformerAbstract
{

    /**
     * Transform the \Transaction entity
     * @param Transaction $model
     *
     * @return array
     */
    public function transform(Transaction $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
