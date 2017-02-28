<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Contracts\RepositoryInterface;

/**
 * Interface CampaignRepository.
 */
interface CampaignRepository extends RepositoryInterface
{
    public function getModel();
}
