<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionGestion extends FormRequest
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
            'gestion' => 'required|unique:gestionas,gestion,' . $this->route('id'),

        ];
    }
    public function messages()
    {
        return [
            'gestion.unique' => 'El campo gestión es unico y se encuentra ya registrado en la base de datos, verfique e intentelo nuevamente.',
        ];


    }
    public function attributes()
    {
        return [
            'gestion' => 'Gestión',
        ];
    }
}
