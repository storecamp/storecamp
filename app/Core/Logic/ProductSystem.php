<?php

namespace App\Core\Logic;


use App\Core\Contracts\ProductSystemContract;
use App\Core\Models\Category;
use App\Core\Repositories\AttributeGroupDescriptionRepository;
use App\Core\Repositories\CategoryRepository;
use App\Core\Repositories\ProductsRepository;
use App\Core\Traits\MediableCore;

/**
 * Class ProductSystem
 * @package App\Core\Logic
 */
class ProductSystem implements ProductSystemContract
{
    use MediableCore;
    /**
     * @var ProductsRepository
     */
    public $productRepository;
    /**
     * @var AttributeGroupDescriptionRepository
     */
    public $attributeGroupDescriptionRepository;

    /**
     * ProductSystem constructor.
     *
     * @param ProductsRepository $productRepository
     * @param AttributeGroupDescriptionRepository $attributeGroupDescriptionRepository
     */
    public function __construct(ProductsRepository $productRepository,
                                AttributeGroupDescriptionRepository $attributeGroupDescriptionRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeGroupDescriptionRepository = $attributeGroupDescriptionRepository;
    }

    /**
     * @param $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = [])
    {
        if ($id) {
            if (!empty($with)) {
                $products = $this->productRepository->with($with);
            } else {
                $products = $this->productRepository;
            }
            $products = $products->findOrFail($id);
        } else {
            if (!empty($with)) {
                $products = $this->productRepository->with($with)->newest()->paginate();
            } else {
                $products = $this->productRepository->newest()->paginate();
            }
        }
        return $products;
    }

    /**
     * @param array $data
     * @param $category
     * @param array $with
     * @return $this|ProductsRepository
     */
    public function categorized(array $data, $category, array $with = [])
    {
        // receive CategoryRepository from IOC container
        $categoryInstance = app(CategoryRepository::class);
        $category = $categoryInstance->findOrFail($category);
        if (!empty($with)) {
            $products = $this->productRepository->with($with)->categorized($category)->paginate();
        } else {
            $products = $this->productRepository->categorized($category)->paginate();
        }
        return $products;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create(array $data)
    {
        $formAttributes = isset($data['product_attribute']) ? $data['product_attribute'] : null;
        unset($data['product_attribute']);

        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : "";
        unset($data['selected_files']);
        $product = $this->productRepository->create($data);
        $this->syncMediaFiles($product, $selectedFiles, 'gallery');

        $categoryId = isset($data['category_id']) ? $data['category_id'] : null;
        $product->categories()->attach($categoryId);
        $attributes = [];
        if ($formAttributes) {
            foreach ($formAttributes as $key => $attr) {
                $attribute = $product->attributeGroupDescription()->save(
                    $this->attributeGroupDescriptionRepository->find(intval($attr["attr_description_id"])), ["value" => $formAttributes[$key]["value"]]);
                $attributes[] = $attribute;
            }
        }
        return $product;
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $formAttributes = isset($data['product_attribute']) ? $data['product_attribute'] : null;
        unset($data['product_attribute']);
        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : "";
        unset($data['selected_files']);
        $product = $this->productRepository->update($data, $id);
        $this->syncMediaFiles($product, $selectedFiles, 'gallery');
        $categoryId = isset($data['category_id']) ? $data['category_id'] : null;
        if ($categoryId) {
            $product->categories()->detach();
            $product->categories()->attach($categoryId);
        }
        $attributes = [];
        $productAttributes = $product->attributeGroupDescription();
        if ($productAttributes->count() > 0) {
            $product->attributeGroupDescription()->sync([]);
        }
        if ($formAttributes) {
            foreach ($formAttributes as $key => $attr) {
                $attribute = $product->attributeGroupDescription()->save(
                    $this->attributeGroupDescriptionRepository->find($attr["attr_description_id"]), ["value" => $formAttributes[$key]["value"]]);
                $attributes[] = $attribute;
            }
        }
        return $product;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->productRepository->delete($id);
        return $deleted;
    }

}