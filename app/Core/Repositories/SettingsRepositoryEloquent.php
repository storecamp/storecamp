<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\SettingsRepository;
use App\Core\Models\Settings;

/**
 * Class SettingsRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class SettingsRepositoryEloquent extends BaseRepository implements SettingsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Settings::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
