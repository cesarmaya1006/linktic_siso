<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionSubCentro extends FormRequest
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
            'centro' => 'required|unique:sub_centro_costos,centro,NULL,id,centro_costo_id,' . $this->centro_costo_id,
            'centro_costo_id' =>'required',
            'consecutivo' =>'required'

        ];
    }
    public function messages()
    {
        return [
            'centro.unique' => 'El nombre del sub-centro de costo ya esxiste asociado al centro de costo, verfique e intentelo nuevamente.'
        ];
    }
    public function attributes()
    {
        return [
            'centro_costo_id' => 'Centro de Costo',
            'centro' => 'Sub-Centro de Costo',

        ];
    }
}
