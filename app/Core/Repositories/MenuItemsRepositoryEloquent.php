<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\MenuItemsRepository;
use App\Core\Models\MenuItems;

/**
 * Class MenuItemsRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class MenuItemsRepositoryEloquent extends BaseRepository implements MenuItemsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuItems::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
