<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Reinscripcion extends Request {

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
			
			'Nombre' => 'required',
			'Fecha' => 'required',
			'Semestre' => 'required',
			'Campus' => 'required',
			'Nivel' => 'required',
			'Modalidad' => 'required',

			'CalleN' => 'required',
			'Colonia' => 'required',
			'Estado' => 'required',
			'Municipio' => 'required',
			'CP' => 'required',
			'Tutor' => 'required',
			'TelefonoC' => 'required',
			'TelefonoCel' => 'required',
			'TelefonoOfc' => 'required',
			'Correo' => 'required'
			

		];
	}

}
