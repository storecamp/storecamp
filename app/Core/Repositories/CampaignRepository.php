<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface CampaignRepository
 * @package namespace App\Core\Repositories;
 */
interface CampaignRepository extends RepositoryInterface
{
    public function getModel();
}
