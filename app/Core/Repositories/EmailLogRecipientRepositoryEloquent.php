<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\EmailLogRecipientRepository;
use App\Core\Models\EmailLogRecipient;

/**
 * Class EmailLogRecipientRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class EmailLogRecipientRepositoryEloquent extends BaseRepository implements EmailLogRecipientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmailLogRecipient::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
