<?php

namespace App\Core\Repositories;

use App\Core\Models\Cart;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class CartRepositoryEloquent.
 */
class CartRepositoryEloquent extends BaseRepository implements CartRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Cart::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
