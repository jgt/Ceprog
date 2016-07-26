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


	public function reporteGeneral($id)
	{

		$examen = $this->search($id);
		$preguntas = $examen->preguntas()->get();

		foreach ($preguntas as $pregunta) {
                
                $preg[] = $pregunta->contenido;
     }


     $content = [

                    ['Universidad Ceprog'],
                    [''],
                    [''],
                    array_merge(['Alumnos/No.Preguntas'],$preg),


            ];

        foreach ($examen->materia->semestre->users as $user) { 

                $usuario= [];
                $usuario[] = $user->name;
            foreach($preguntas as $pregunta){
                foreach ($user->respuestasUser as $preguntaUser) {
                    if ($pregunta->id == $preguntaUser->pregunta_id) {
                        
                        foreach ($pregunta->respuestas as $respuesta) {
                            if ($respuesta->id == $preguntaUser->respuesta_id) {
                                if ($respuesta->estado==1) {

                                    $usuario[] = $respuesta->estado;
                                }
                            }
                        }
                    }
                }

            }
           $content[] = $usuario;   
        }

        	return $content;
	}
}