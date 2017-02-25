<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface SubscribersRepository
 * @package namespace SXC\Repositories;
 */
interface SubscribersRepository extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel();

    /**
     * @param $request
     * @param $type
     * @return mixed
     */
    public function createSubscription($request, $type);

    /**
     * @param $request
     * @param $type
     * @param $subscription_id
     * @return mixed
     */
    public function deleteSubscription($request, $type, $subscription_id);


    /**
     * @param $email
     * @return mixed
     */
    public function findSubscriber($email);

    /**
     * @param null $type
     * @return mixed
     */
    public function getNewsList($type=null);

}
