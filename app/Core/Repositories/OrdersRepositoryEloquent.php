<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\OrdersRepository;
use App\Core\Models\Orders;

/**
 * Class OrdersRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class OrdersRepositoryEloquent extends BaseRepository implements OrdersRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Orders::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


}
