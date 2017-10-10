<?php

namespace App\Core\Repositories;

use App\Core\Models\EmailLogRecipient;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class EmailLogRecipientRepositoryEloquent.
 */
class EmailLogRecipientRepositoryEloquent extends BaseRepository implements EmailLogRecipientRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return EmailLogRecipient::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
