<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearEntradaRequest extends FormRequest
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
            'contenido' => ['required'],
            'portada' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Por favor introduce una titulo para la etrada',
            'contenido.required' => 'Por favor introduce el contenido de la entrada',
            'portada.required' => 'Por favor introduce una imagen destacada',
        ];
    }
}
