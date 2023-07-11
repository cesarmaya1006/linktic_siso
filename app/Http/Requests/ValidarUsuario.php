<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarUsuario extends FormRequest
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
            'identificacion' => 'required|max:250|unique:personas,identificacion,' . $this->route('id'),
            'email' => 'required|max:250|unique:personas,email,' . $this->route('id'),
        ];
    }
    public function messages()
    {
        return [
            'identificacion.unique' => 'El numero de identificacion se encuentra duplicado en la base de datos, verfique e intentelo nuevamente.',
            'email.unique' => 'El correo se encuentra duplicado, verfique e intentelo nuevamente.'
        ];

    }
    public function attributes()
    {
        return [
            'identificacion' => 'Número de Identificación',
            'email' => 'Correo Electronico',

        ];
    }
}
