<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\LayoutRepository;
use App\Core\Models\Layout;

/**
 * Class LayoutRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class LayoutRepositoryEloquent extends BaseRepository implements LayoutRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Layout::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
