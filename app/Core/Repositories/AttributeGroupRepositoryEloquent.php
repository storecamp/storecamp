<?php

namespace App\Core\Repositories;

use App\Core\Models\AttributeGroup;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class AttributeGroupRepositoryEloquent.
 */
class AttributeGroupRepositoryEloquent extends BaseRepository implements AttributeGroupRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return AttributeGroup::class;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        $model = AttributeGroup::class;

        return new $model();
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
