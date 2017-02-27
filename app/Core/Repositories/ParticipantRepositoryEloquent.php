<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\ParticipantRepository;
use App\Core\Models\Participant;

/**
 * Class ParticipantRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class ParticipantRepositoryEloquent extends BaseRepository implements ParticipantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Participant::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
