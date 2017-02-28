<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\CounterRepository;
use App\Core\Models\Counter;

/**
 * Class CounterRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class CounterRepositoryEloquent extends BaseRepository implements CounterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Counter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
