<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\ParserRepository;
use App\Core\Models\Parser;

/**
 * Class ParserRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class ParserRepositoryEloquent extends BaseRepository implements ParserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Parser::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
