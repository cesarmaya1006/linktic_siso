<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCambioPass extends FormRequest
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
            'password_new' => 'required|min:5',
            'password_rec' => 'required|min:5|same:password_new',
        ];
    }
    public function messages()
    {
        return [
            'password_rec.same' => 'Las Contraseñas ingresadas no coinciden, verfique e intentelo nuevamente.'
        ];
    }
    public function attributes()
    {
        return [
            'password_new' => 'Nueva Contraseña',
            'password_rec' => 'Confirmar Nueva Contraseña',

        ];
    }
}
