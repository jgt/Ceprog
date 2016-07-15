<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUnidad extends Request
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
            
            'materia' => 'required',
            'seriacion' => 'required',
            'clave' => 'required',
            'fecha' => 'required',
            'objetivo' => 'required',
            'asesor' => 'required',
            'unidad' => 'tema',
            'actividadP' => 'required'
            'materia_id' => 'required',
            'user_id' => 'required'
        ];
    }
}
