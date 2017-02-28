<?php

namespace App\Core\Transformers;

use App\Core\Models\Message;
use League\Fractal\TransformerAbstract;

/**
 * Class MessageTransformer.
 */
class MessageTransformer extends TransformerAbstract
{
    /**
     * Transform the \Message entity.
     * @param \Message $model
     *
     * @return array
     */
    public function transform(Message $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
