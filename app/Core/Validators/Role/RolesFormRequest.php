<?php

namespace App\Core\Validators\Role;

use Illuminate\Foundation\Http\FormRequest as Request;

class RolesFormRequest extends Request
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
            'name' => 'required',
            'display_name' => 'unique:roles,display_name'
        ];
    }
}
