<?php

namespace App\Core\Repositories;

use App\Core\Models\Currency;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class CurrencyRepositoryEloquent.
 */
class CurrencyRepositoryEloquent extends BaseRepository implements CurrencyRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Currency::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
