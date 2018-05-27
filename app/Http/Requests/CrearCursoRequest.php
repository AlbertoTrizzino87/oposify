<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearCursoRequest extends FormRequest
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
            'descripcion' => ['required','max:200'],
            'precio' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'Por favor introduce una descripción del curso',
            'descripcion.max' => 'La descripción no puede tener más de 200 carcteres',
            'precio.required' => 'Por favor introduce el precio del curso',
        ];
    }
}
