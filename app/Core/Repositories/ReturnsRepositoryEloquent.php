<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\ReturnsRepository;
use App\Core\Models\Returns;

/**
 * Class ReturnRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class ReturnsRepositoryEloquent extends BaseRepository implements ReturnsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Returns::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
