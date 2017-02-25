<?php

namespace App\Core\Validators\ProductReview;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductReviewFormRequest extends FormRequest
{
    /**
     * Access is presented in middleware layer
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
        return [
            "review" => "required|string|min:25,max:3000",
            "hidden" => "required|boolean",
            "rating" => "required|numeric|min:0,max:5"
        ];
    }
}
