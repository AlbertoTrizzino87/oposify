<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearApunteRequest extends FormRequest
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
            'apuntes' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Por favor introduce el titulo de los apuntes',
            'apuntes.required' => 'Por favor sube  los apuntes del curso',
        ];
    }
}
