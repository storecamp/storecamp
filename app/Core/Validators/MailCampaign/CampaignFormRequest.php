<?php


namespace App\Core\Validators;

use Illuminate\Foundation\Http\FormRequest as Request;

class CampaignFormRequest extends Request
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
            'to' => 'required|numeric|min:1,max:11',
            'subject' => 'required|min:3',
            'message' => 'required|min:25,max:5000'
        ];
    }
}