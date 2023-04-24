<?php

namespace App\Http\Requests;

use App\Rules\Cedula;
use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpleado extends FormRequest
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
            'cedula' =>'required|unique:empleados,cedula,' . $this->route('id'),
        ];
    }
    public function messages()
    {
        return [
            'cedula.unique' => 'La cédula ya se encuentra asociada a un empleado, Verifique la información y/o consulte con recursos humanos'
        ];
    }
    public function attributes()
    {
        return [
            'cedula' => 'La Cédula'
        ];
    }
}
