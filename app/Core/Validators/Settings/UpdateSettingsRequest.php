<?php

namespace App\Core\Validators\Settings;

use App\Core\Models\Settings;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
        $id = $this->id;
        $key = Settings::find($id)->key;

        return [
            'key' => 'required|string|unique:settings,key,'.$key.'|min:1,max:255',
            'setting' => 'required|string|min:1,max:1024',
        ];
    }
}
