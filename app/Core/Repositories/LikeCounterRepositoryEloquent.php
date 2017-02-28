<?php

namespace App\Core\Repositories;

use App\Core\Models\LikeCounter;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class LikeCounterRepositoryEloquent.
 */
class LikeCounterRepositoryEloquent extends BaseRepository implements LikeCounterRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return LikeCounter::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
