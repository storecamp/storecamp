<?php

namespace App\Core\Repositories;

use App\Core\Models\EmailLog;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class EmailLogRepositoryEloquent.
 */
class EmailLogRepositoryEloquent extends BaseRepository implements EmailLogRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return EmailLog::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
