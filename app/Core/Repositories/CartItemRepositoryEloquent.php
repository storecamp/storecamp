<?php

namespace App\Core\Repositories;

use App\Core\Models\CartItem;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class CartItemRepositoryEloquent.
 */
class CartItemRepositoryEloquent extends BaseRepository implements CartItemRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return CartItem::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
