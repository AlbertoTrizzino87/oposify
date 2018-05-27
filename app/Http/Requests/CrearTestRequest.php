<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearTestRequest extends FormRequest
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
            'titulo' => ['required'],
            'test' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Por favor introduce el titulo del test',
            'test.required' => 'Por favor sube  el test',
        ];
    }
}
