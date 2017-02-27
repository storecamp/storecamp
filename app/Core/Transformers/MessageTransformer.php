<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Message;

/**
 * Class MessageTransformer
 * @package namespace App\Core\Transformers;
 */
class MessageTransformer extends TransformerAbstract
{

    /**
     * Transform the \Message entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
