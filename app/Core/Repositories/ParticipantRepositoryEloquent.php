<?php

namespace App\Core\Repositories;

use App\Core\Models\Participant;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class ParticipantRepositoryEloquent.
 */
class ParticipantRepositoryEloquent extends BaseRepository implements ParticipantRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Participant::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
