<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\StaticPagesRepository;
use App\Core\Models\StaticPages;

/**
 * Class StaticPagesRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class StaticPagesRepositoryEloquent extends BaseRepository implements StaticPagesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StaticPages::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
