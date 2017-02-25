<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\PromocodeRepository;
use App\Core\Models\Promocode;

/**
 * Class PromocodeRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class PromocodeRepositoryEloquent extends BaseRepository implements PromocodeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Promocode::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
