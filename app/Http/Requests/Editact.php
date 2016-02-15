<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Editact extends Request {

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
		'valoractividad' => 'required',
		'evidencia' => 'required',
		'caracteristicas' => 'required',
		'realizacion' => 'required',
		'fecha' => 'required',
		'fechaF' => 'required',
		'codigoactividad' => 'required',
		'unidad_id' => 'required',
		];
	}

}
