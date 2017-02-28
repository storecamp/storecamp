<?php

namespace App\Core\Repositories;

use App\Core\Models\Campaign;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class CampaignRepositoryEloquent.
 */
class CampaignRepositoryEloquent extends BaseRepository implements CampaignRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Campaign::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
