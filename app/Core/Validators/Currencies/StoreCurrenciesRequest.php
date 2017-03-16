<?php

namespace App\Core\Validators\Currencies;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrenciesRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:2,max:255',
            'code' => 'required|string|min:2,max:10',
            'sign' => 'string|min:1,max:255',
        ];
    }
}
