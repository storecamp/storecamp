<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface FeedBackRepository
 * @package namespace SXC\Repositories;
 */
interface ProductReviewRepository extends RepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel();

    /**
     * get all Feedbacks
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getAllUsers();

    /**
     * @param $id
     * @param $message
     * @return mixed
     */
    public function replyProductReview($id, $message);

    /**
     * @return mixed
     */
    public function countUserProductReviews();


    /**
     * get all feedbacks by user id
     * @param $id
     * @return mixed
     */
    public function getAllUserById($id);
}
