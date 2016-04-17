<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Maestro extends Request {

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
			
		'cognoscitivo' => 'required',
		'actividad' => 'required',
		'descripcion' => 'required',
		'estrategia' => 'required',
		'valoractividad' => 'required|integer|min:0|max:40',
		'evidencia' => 'required',
		'caracteristicas' => 'required',
		'realizacion' => 'required',
		'codigoactividad' => 'required',
		'unidad_id' => 'required',
		];
	}

}
