<?php

namespace App\Core\Repositories;

use App\Core\Models\AttributeGroupDescription;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class AttributeGroupDescriptionRepositoryEloquent.
 */
class AttributeGroupDescriptionRepositoryEloquent extends BaseRepository implements AttributeGroupDescriptionRepository
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
        return AttributeGroupDescription::class;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        $model = AttributeGroupDescription::class;

        return new $model;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
