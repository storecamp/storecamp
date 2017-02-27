<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\ThreadRepository;
use App\Core\Models\Thread;

/**
 * Class ThreadRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class ThreadRepositoryEloquent extends BaseRepository implements ThreadRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Thread::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
