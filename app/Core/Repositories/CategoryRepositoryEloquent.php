<?php

namespace App\Core\Repositories;

use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\CategoryRepository;
use App\Core\Models\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'slug' => 'like',
        'created_at' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Boot up the repository, pushing criteria
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
        $model = Category::class;

        return new $model;
    }

    /**
     * @return mixed
     */
    public function getCategories(){

        $categories = $this->getModel()->where('parent_id', null)->get();//united

        $categories = $this->addRelation($categories);

        return $categories;

    }

    /**
     * @param $id
     * @return mixed
     */
    protected function selectChild($id)
    {
        $categories = $this->getModel()->where('parent_id',$id)->get(); //rooney

        $categories = $this->addRelation($categories);

        return $categories;

    }

    /**
     * @param $categories
     * @return mixed
     */
    protected function addRelation($categories){

        $categories->map(function ($item, $key) {

            $sub = $this->selectChild($item->id);

            return $item = array_add($item,'subCategory',$sub);

        });

        return $categories;
    }
}
