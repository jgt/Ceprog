<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Email extends Request {

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
			
			'Campus' => 'required',
			'ApellidoP' => 'required',
			'ApellidoM' => 'required',
			'Nombres' => 'required',
			'FechaN' => 'required',
			'Sexo' => 'required',
			'Edad' => 'required',
			'Curp' => 'required',

			'CalleN' => 'required',
			'Pais' => 'required',
			'Estado' => 'required',
			'Ciudad' => 'required',
			'TelefonoC' => 'required',
			'TelefonoCel' => 'required',
			'Correo' => 'required',

			'Programa' => 'required',
			'Modalidad' => 'required',
			'Turno' => 'required',
			'Periodo' => 'required',

			'escuela' => 'required',
			'nivel' => 'required',
			'fechaE' => 'required',

			'nombreEp' => 'required',
			'CalleEP' => 'required',
			'PaisEP' => 'required',
			'EstadoEP' => 'required',
			'CiudadEP' => 'required',
			'TelefonoEP' => 'required',
			'Correo' => 'required',
			'PuestoTR' => 'required',
			'OcupacionTR' => 'required',

			'Civil' => 'required',
			'tutor' => 'required',
			'EdadT' => 'required',
			'Parentesco' => 'required',
			'TelefonoDT' => 'required',
			'Ocupacion' => 'required',
			'Enfermedad' => 'required',
			'MedioTR' => 'required',
			'Ceprog' => 'required'



		];
	}

}
