<?php

namespace App\Core\Repositories;

use App\Core\Models\Product;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Eloquent\BaseRepository;

/**
 * Class ProductsRepositoryEloquent.
 */
class ProductsRepositoryEloquent extends BaseRepository implements ProductsRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title' => 'like',
        'model' => 'like',
        'price' => 'like',
        'quantity' => '=',
        'stock_status' => '=',
    ];

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        $model = $this->model();

        return new $model;
    }
}
