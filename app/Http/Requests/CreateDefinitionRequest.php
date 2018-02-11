<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDefinitionRequest extends FormRequest
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
            'title' => 'required|text:255',
            'definicija'    =>  'required|text:255'
        ];

    }

    public function messages()
    {
        return [
          'title|required'  =>  'Niste uneli naslov',
          'definicija|required'  =>  'Niste uneli sadrzaj definicije'
        ];
    }
}
