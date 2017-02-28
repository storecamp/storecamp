<?php

namespace App\Core\Repositories;

use App\Core\Models\Layout;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class LayoutRepositoryEloquent.
 */
class LayoutRepositoryEloquent extends BaseRepository implements LayoutRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Layout::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
