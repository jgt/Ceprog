<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DtaM extends Request
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
            
            'formacion' => 'required',
            'celular' => 'required',
            'antiguedad' => 'required',
            'curriculum' => 'required',
            'modelo' => 'required',
            'contrato' => 'required',
            'entrevista' => 'required',
            'identidad' => 'required',
            'planeacion' => 'required',
            'erom' => 'required',
            'apa' => 'required',
            'campus' => 'required',
            'user_id' => 'required'
        ];
    }
}
