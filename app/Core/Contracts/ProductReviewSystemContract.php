<?php

namespace App\Core\Contracts;


interface ProductReviewSystemContract extends BaseLogicContract
{

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function replyProductReview($id, array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function toggleVisibility($id, array $data);

    /**
     * @param $id
     * @param $data
     */
    public function markAsRead($id, $data);

    /**
     * @param array $data
     * @param int $messageId
     * @return mixed
     */
    public function editMessage(array $data,int $messageId);

    /**
     * @param int $messageId
     * @param array $data
     * @return mixed
     */
    public function deleteMessage(int $messageId, array $data = []);
}