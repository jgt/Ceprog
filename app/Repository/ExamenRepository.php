<?php namespace App\Repository;


use App\Examen;
use App\Pregunta;
use App\RespuestaUser;

class ExamenRepository extends BaseRepository
{


	public function getModel()
	{

		return new Examen();
	}


	public function listExamen()
	{

		$examen = Examen::all();

		return $examen;
	}

	public function respuestasCorrectas($id)
	{

		$examen = $this->search($id);
	
		foreach ($examen->materia->semestre->users as $user) {
			
			$alumnos[] = $user;
			foreach ($alumnos as $alumno) {
				foreach ($alumno->respuestasUser as $resp) {
					
					if($user->id == $resp->user_id && $resp->respuesta->estado == 1)
					{
						$respuestas[] = $resp;
					}
				
				}
			}
		}

		return $respuestas;
	}

}