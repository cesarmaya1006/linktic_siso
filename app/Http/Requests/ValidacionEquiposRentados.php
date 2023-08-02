<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEquiposRentados extends FormRequest
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
            'ticket' => 'required|numeric',
            'serial' => 'required|unique:equipo_rentados,serial,' . $this->route('id'),
            'codigo' => 'required|unique:equipo_rentados,codigo,' . $this->route('id'),

        ];
    }
    public function messages()
    {
        return [
            'ticket.numeric' => 'El campo Ticket solo acepta numeros, verfique e intentelo nuevamente.',
            'serial.unique' => 'El campo Serial de Equipo es unico y se encuentra ya registrado en la base de datos, verfique e intentelo nuevamente.',
            'codigo.unique' => 'El campo Código de Equipo es unico y se encuentra ya registrado en la base de datos, verfique e intentelo nuevamente.',
        ];


    }
    public function attributes()
    {
        return [
            'ticket' => 'Ticket',
        ];
    }
}
