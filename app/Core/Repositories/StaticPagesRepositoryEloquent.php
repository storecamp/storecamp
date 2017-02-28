<?php

namespace App\Core\Repositories;

use App\Core\Models\StaticPages;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class StaticPagesRepositoryEloquent.
 */
class StaticPagesRepositoryEloquent extends BaseRepository implements StaticPagesRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return StaticPages::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
