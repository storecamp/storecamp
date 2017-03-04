<?php

namespace App\Core\Transformers;


use App\Core\Logic\CategorySystem;
use App\Core\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoriesDataTransformer extends TransformerAbstract
{
    /**
     * @param Category $category
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $this->getName($category),
            'slug' => $category->slug,
            'description' => $this->getDescription($category),
            'status' => $this->getStatus($category),
            'sort_order' => $category->sort_order,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'action' => $this->getActions($category),
        ];
    }

    /**
     * @param Category $category
     * @return string
     */
    private function getDescription(Category $category): string
    {
        return '<a data-toggle="modal" href="#Description-modal"
           class="btn btn-xs btn-info"
           data-desc-url="' . route('admin::categories::description', $category->unique_id) . '"
           data-desc-id="' . $category->unique_id . '"
           data-desc-name="' . $category->name . '">
            show
        </a>';
    }

    /**
     * @param Category $category
     * @return string
     */
    private function getName(Category $category): string
    {
        return CategorySystem::getCategoryFullPath($category) . '<small class="text-muted label bg-info pull-right">' . $category->getType() . '</small>';
    }

    /**
     * @param Category $category
     * @return string
     */
    private function getActions(Category $category): string
    {
        return '<a class="btn btn-default edit" href="' . route('admin::categories::edit', $category->unique_id) . '" title="Edit">
            <em class="fa fa-pencil-square-o"></em>
        </a>
        <a class="btn btn-danger delete text-warning" href="' . route('admin::categories::get::delete', $category->unique_id) . '"
           title="Are you sure you want to delete?"><em class="fa fa-trash-o"></em>
        </a>';
    }

    /**
     * @param Category $category
     * @return string
     */
    private function getStatus(Category $category): string
    {
        if ($category->status) {
            return '<td><div class="label bg-green"> active</div></td>';
        } else
            return '<td><div class="label bg-warning">not active</div></td>';
    }
}