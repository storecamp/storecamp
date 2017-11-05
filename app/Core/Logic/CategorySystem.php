<?php

namespace App\Core\Logic;

use App\Core\Contracts\CategorySystemContract;
use App\Core\Models\Category;
use App\Core\Traits\MediableCore;

/**
 * Class CategorySystem.
 */
class CategorySystem implements CategorySystemContract
{
    use MediableCore;
    /**
     * @var Category
     */
    public $category;

    /**
     * CategorySystem constructor.
     */
    public function __construct()
    {
        $this->category = new Category();
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     *
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $categories = $this->category->find($id);
        } else {
            $categories = $this->category->orderBy('parent_id', 'ASC')->paginate();
        }
        if ($with) {
            $categories->load($with);
        }

        return $categories;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $data['parent_id'] = empty($data['parent_id']) ? null : $data['parent_id'];
        $data['sort_order'] = empty($data['sort_order']) ? 0 : $data['sort_order'];
        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : '';
        unset($data['selected_files']);
        $category = $this->category->create($data);
        $this->syncMediaFile($category, $selectedFiles, 'thumbnail');

        return $category;
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $data['parent_id'] = empty($data['parent_id']) ? null : $data['parent_id'];
        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : '';
        unset($data['selected_files']);
        $category = $this->category->findOrFail($id);
        $category->update($data);
        $this->syncMediaFile($category, $selectedFiles, 'thumbnail');

        return $category;
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return int
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->category->destroy($id);

        return $deleted;
    }

    // SYSTEM HELPERS SECTION

    /**
     * string $type = "string" | "array".
     *
     * @param Category $category
     * @param string $type
     *
     * @return string
     */
    public static function getCategoryFullPath(Category $category, string $type = 'string')
    {
        $parents = [];
        foreach ($category->parents() as $parent) {
            $parents[] = $parent->name;
        }
        array_push($parents, $category->name);
        if ($type == 'string') {
            $parents = implode('/', $parents);
        }

        return $parents;
    }
}
