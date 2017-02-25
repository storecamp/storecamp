<?php

namespace App\Core\Logic;

use App\Core\Contracts\CategorySystemContract;
use App\Core\Models\Media;
use App\Core\Repositories\CategoryRepository;
use App\Core\Traits\MediableCore;

/**
 * Class CategorySystem
 * @package App\Core\Logic
 */
class CategorySystem implements CategorySystemContract
{
    use MediableCore;
    /**
     * @var CategoryRepository
     */
    public $categoryRepository;

    /**
     * CategorySystem constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param array $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $categories = $this->categoryRepository->with($with)->find($id);
        } else {
            if(!empty($with)) {
                $categories = $this->categoryRepository->with($with)->order('parent_id', 'ASC')->paginate();
            } else {
                $categories = $this->categoryRepository->order('parent_id', 'ASC')->paginate();
            }
        }
        return $categories;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $data['top'] = isset($data['top']) ? $data['top'] == "on" ? true : false : false;
        $data["parent_id"] = empty($data["parent_id"]) ? null : $data["parent_id"];
        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : "";
        unset($data['selected_files']);
        $category = $this->categoryRepository->create($data);
        $this->syncMediaFile($category, $selectedFiles, 'thumbnail');
        return $category;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $data['top'] = isset($data['top']) ? $data['top'] == "on" ? true : false : false;
        $data["parent_id"] = empty($data["parent_id"]) ? null : $data["parent_id"];
        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : "";
        unset($data['selected_files']);
        $category = $this->categoryRepository->find($id);
        $category->update($data);
        $this->syncMediaFile($category, $selectedFiles, 'thumbnail');
        return $category;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function delete($id, array $data = []) : int
    {
        $deleted = $this->categoryRepository->delete($id);
        return $deleted;
    }
}