<?php

namespace App\Core\Repositories;

use App\Core\Models\Orders;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class OrdersRepositoryEloquent.
 */
class OrdersRepositoryEloquent extends BaseRepository implements OrdersRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Orders::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
