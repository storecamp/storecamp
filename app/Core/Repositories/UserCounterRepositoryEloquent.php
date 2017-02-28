<?php

namespace App\Core\Repositories;

use App\Core\Models\UserCounter;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class UserCounterRepositoryEloquent.
 */
class UserCounterRepositoryEloquent extends BaseRepository implements UserCounterRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return UserCounter::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
