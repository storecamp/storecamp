<?php

namespace App\Core\Validators\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductsUpdateFormRequest extends FormRequest{



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|min:2',
            'body' => 'required|min:20',
            'price' => 'required|numeric',
            'availability' => 'required|integer',
            'category_id' => 'required|integer',
            'date_available' => 'date',
            'model' => 'string|min:2',
            'quantity' => 'numeric',
            'sku' => 'string|unique:products,sku,' . $this->get('id') ?? $this->get('unique_id'),
            'upc' => 'string|unique:products,upc,' . $this->get('id') ?? $this->get('unique_id'),
            'ean' => 'string|unique:products,ean,' . $this->get('id') ?? $this->get('unique_id'),
            'jan' => 'string|unique:products,jan,' . $this->get('id') ?? $this->get('unique_id'),
            'isbn' => 'string|unique:products,isbn,' . $this->get('id') ?? $this->get('unique_id'),
            'mpn' => 'string|unique:products,mpn,' . $this->get('id') ?? $this->get('unique_id'),
            'length' => 'string|min:1',
            'width'=> 'string|min:1',
            'height'=> 'string|min:1',
            'meta_tag_title' => 'string|min:2',
            'meta_tag_description' => 'string|min:5',
            'meta_tag_keywords' => 'string|min:2',
            'sort_order' => 'numeric|max:10',
            'weight' => 'string|min:1',
            'product_attribute.*.attr_description_id' => ""
        ];

        return $rules;

    }

}