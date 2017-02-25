<?php


namespace App\Core\Validators;

use Illuminate\Foundation\Http\FormRequest as Request;

class MailFormRequest extends Request
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
     * @return array
     */
    public function rules() {
        return [
            'message' => 'required|min:25,max:5000'
        ];
    }
}