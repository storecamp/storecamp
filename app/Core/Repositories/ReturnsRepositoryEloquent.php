<?php

namespace App\Core\Repositories;

use App\Core\Models\Returns;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class ReturnRepositoryEloquent.
 */
class ReturnsRepositoryEloquent extends BaseRepository implements ReturnsRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Returns::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
