<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\LikeRepository;
use App\Core\Models\Like;

/**
 * Class LikeRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class LikeRepositoryEloquent extends BaseRepository implements LikeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Like::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
