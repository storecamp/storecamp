<?php

namespace App\Core\Repositories;

use App\Core\Models\Promocode;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class PromocodeRepositoryEloquent.
 */
class PromocodeRepositoryEloquent extends BaseRepository implements PromocodeRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Promocode::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
