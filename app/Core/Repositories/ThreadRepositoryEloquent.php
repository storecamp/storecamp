<?php

namespace App\Core\Repositories;

use App\Core\Models\Thread;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class ThreadRepositoryEloquent.
 */
class ThreadRepositoryEloquent extends BaseRepository implements ThreadRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Thread::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
