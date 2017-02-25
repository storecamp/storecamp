<?php


namespace App\Core\Validators\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductsFormRequest extends FormRequest
{
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
            'date_available' => 'required|date',
            'model' => 'string|min:2',
            'quantity' => 'numeric|min:1',
            'sku' => 'string|unique:products',
            'upc' => 'string|unique:products',
            'ean' => 'string|unique:products',
            'jan' => 'string|unique:products',
            'isbn' => 'string|unique:products',
            'mpn' => 'string|unique:products',
            'length' => 'string|min:1',
            'width' => 'string|min:1',
            'height' => 'string|min:1',
            'meta_tag_title' => 'string|min:2',
            'meta_tag_description' => 'string|min:5',
            'meta_tag_keywords' => 'string|min:2',
            'sort_order' => 'numeric|max:10',
            'weight' => 'string|min:1'
        ];
        return $rules;
    }

}