<?php

namespace App\Core\Repositories;

use App\Core\Models\Coupon;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class CouponRepositoryEloquent.
 */
class CouponRepositoryEloquent extends BaseRepository implements CouponRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Coupon::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
