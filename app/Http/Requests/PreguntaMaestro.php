<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PreguntaMaestro extends Request
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
            
            'contenido' => 'required',
            'valor' => 'required',
            'examen_docente_id' => 'required',
            'rango_id' => 'required'

        ];
    }
}
