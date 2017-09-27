<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\EmailLogRepository;
use App\Core\Models\EmailLog;

/**
 * Class EmailLogRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class EmailLogRepositoryEloquent extends BaseRepository implements EmailLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmailLog::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
