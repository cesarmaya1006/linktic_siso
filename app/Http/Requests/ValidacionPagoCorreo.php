<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPagoCorreo extends FormRequest
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
            'costo_dolares' => 'numeric|min:1',
            'trm' => 'numeric|min:1',
            'costo_pesos' => 'numeric|min:1',
        ];
    }
    public function messages()
    {
        return [
            'costo_dolares.numeric' => 'El campo costo dolares acepta unicamente numeros (Pueden ser decimales) verifique si uso "." ó , "," dependiendo de su configuración regional de equipo, verfique e intentelo nuevamente.',
            'trm.numeric' => 'El campo trm acepta unicamente numeros (Pueden ser decimales) verifique si uso "." ó , "," dependiendo de su configuración regional de equipo, verfique e intentelo nuevamente.',
            'costo_pesos.numeric' => 'El campo costo pesos acepta unicamente numeros (Pueden ser decimales) verifique si uso "." ó , "," dependiendo de su configuración regional de equipo, verfique e intentelo nuevamente.',
        ];
        


    }
    public function attributes()
    {
        return [
            'costo_dolares' => 'Costo Dolares',
            'trm' => 'TRM',
            'costo_pesos' => 'Costo pesos',
        ];
    }
}
