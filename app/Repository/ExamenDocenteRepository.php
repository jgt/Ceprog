<?php namespace App\Repository;


use App\Administrador\EvaluacionMaestro\PreguntaDocente;
use App\Administrador\EvaluacionMaestro\RespuestaDocente;
use App\Administrador\EvaluacionMaestro\PosibleRespuesta;
use App\Administrador\EvaluacionMaestro\ExamenDocente;
use App\Http\Requests\Docente;
use Auth;
use App\Administrador\EvaluacionMaestro\Rango;


class ExamenDocenteRepository extends BaseRepository {

	public function getModel()
	{
		return new ExamenDocente();
	}


	public function crearExamen(Docente $request)
	{
		$examen = ExamenDocente::create($request->all());
		$examen->materias()->attach($request->get('materia_list'));
		return $examen;
	}

	public function listaPreguntas($id)
	{
		$examen = $this->search($id);
		$preguntas = PreguntaDocente::where('examen_docente_id', $id)->orderBy('id', 'desc')->get();
		$preguntaNext= [];
		$nota =0;

		foreach ($preguntas as  $pregunta) {
                //comprobamos si las preguntas ya fueron contestadas por el alumno.
            $repuestaUser = RespuestaDocente::where('pregunta_docente_id', $pregunta->id)->where('user_id',Auth::user()->id)->count();
            // me traigo todas las respuestas correctas
             $respuestas = PosibleRespuesta::where('pregunta_docente_id',$pregunta->id)->where('estado',1)->get();
            
             foreach ( $respuestas as $respuesta) {
              $correcta = RespuestaDocente::where('posible_respuesta_id',$respuesta->id)->where('user_id',Auth::user()->id)->count();
              
              if($correcta==1):
                        $nota += $pregunta->valor;
                endif;

          }

          if(! $repuestaUser):

                    $preguntaNext = PreguntaDocente::where('id', $pregunta->id)->with('respuestasDocentes')->orderBy('id', 'desc')->get();

                endif;
            }

            $detalles = ['pregunta' => $preguntaNext, 'nota' => $nota];

		return $detalles;
	}

	public function listaExamenes()
	{
		$examenes = $this->getModel()->all();
		return $examenes;
	}

	

}