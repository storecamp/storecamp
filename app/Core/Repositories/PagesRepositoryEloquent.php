<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\PagesRepository;
use App\Core\Models\Pages;

/**
 * Class PagesRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class PagesRepositoryEloquent extends BaseRepository implements PagesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pages::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
