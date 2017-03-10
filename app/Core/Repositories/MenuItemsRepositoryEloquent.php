<?php

namespace App\Core\Repositories;

use App\Core\Models\MenuItems;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class MenuItemsRepositoryEloquent.
 */
class MenuItemsRepositoryEloquent extends BaseRepository implements MenuItemsRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return MenuItems::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param array $params
     * @return $this
     */
    public function createOrFirst(array $params)
    {
        if (! isset($params['menu_id']) && ! isset($params['title']) && ! isset($params['url'])) {
            throw new \Exception('Menu Id, Title, Url params not specified', 422);
        }
        $menuItem = $this->findWhere([
            ['menu_id', '=', $params['menu_id']], ['title', '=', $params['title']],
        ]);
        if (count($menuItem)) {
            return $menuItem->first();
        } else {
            $model = $this->updateOrCreate($params);

            return $model;
        }
    }
}
