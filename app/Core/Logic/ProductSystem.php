<?php

namespace App\Core\Logic;

use App\Core\Contracts\ProductSystemContract;
use App\Core\Models\AttributeGroupDescription;
use App\Core\Models\Product;
use App\Core\Traits\MediableCore;

/**
 * Class ProductSystem.
 */
class ProductSystem implements ProductSystemContract
{
    use MediableCore;
    /**
     * @var Product
     */
    public $product;
    /**
     * @var AttributeGroupDescription
     */
    public $attributeGroupDescription;

    /**
     * ProductSystem constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->attributeGroupDescription = new AttributeGroupDescription();
    }

    /**
     * @param $data
     * @param null $id
     * @param array $with
     *
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $products = $this->product->with($with)->find($id);
        } else {
            $products = $this->product->with($with)->newest()->paginate();
        }

        return $products;
    }

    /**
     * @param array $data
     * @param $category
     * @param array $with
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function categorized(array $data, $category, array $with = [])
    {
        array_push($with, 'categories');
        if (!empty($with)) {
            $products = $this->product->categorized($category)->with($with)->paginate();
        } else {
            $products = $this->product->categorized($category)->paginate();
        }
        return $products;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $formAttributes = isset($data['product_attribute']) ? $data['product_attribute'] : null;
        unset($data['product_attribute']);

        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : '';
        unset($data['selected_files']);
        $product = $this->product->create($data);
        $this->syncMediaFiles($product, $selectedFiles, 'gallery');
        $categoryId = isset($data['category_id']) ? $data['category_id'] : null;
        $product->categories()->attach($categoryId);
        $attributes = [];
        if ($formAttributes) {
            foreach ($formAttributes as $key => $attr) {
                $attribute = $product->attributeGroupDescription()->save(
                    $this->attributeGroupDescription
                        ->find(intval($attr['attr_description_id'])),
                    ['value' => $formAttributes[$key]['value']]);
                $attributes[] = $attribute;
            }
        }

        return $product;
    }

    /**
     * @param $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $formAttributes = isset($data['product_attribute']) ? $data['product_attribute'] : null;
        unset($data['product_attribute']);
        $selectedFiles = isset($data['selected_files']) ? $data['selected_files'] : '';
        unset($data['selected_files']);
        $product = $this->product->find($id);
        $product->update($data);
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
                    $this->attributeGroupDescription
                        ->find($attr['attr_description_id']),
                    ['value' => $formAttributes[$key]['value']]
                );
                $attributes[] = $attribute;
            }
        }

        return $product;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->product->findOrFail($id)->delete();

        return $deleted;
    }
}
