<?php namespace App\Repository;


use App\Administrador\EvaluacionMaestro\PreguntaDocente;
use App\Administrador\EvaluacionMaestro\RespuestaDocente;
use App\Administrador\EvaluacionMaestro\PosibleRespuesta;
use App\Administrador\EvaluacionMaestro\ExamenDocente;
use App\Http\Requests\Docente;
use Auth;
use App\Materia;


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

	public function listaPreguntas($id, $materia)
	{
		$examen = $this->search($id);
		$mat =  Materia::find($materia);
		$preguntas = PreguntaDocente::where('examen_docente_id', $id)->orderBy('id', 'desc')->get();
		$preguntaNext= [];

		foreach ($preguntas as  $pregunta) {
                //comprobamos si las preguntas ya fueron contestadas por el alumno.
            $repuestaUser = RespuestaDocente::where('pregunta_docente_id', $pregunta->id)->where('user_id',Auth::user()->id)->where('materia_id', $mat->id)->count();
            
          if(! $repuestaUser):

                    $preguntaNext = PreguntaDocente::where('id', $pregunta->id)->with('respuestasDocentes')->orderBy('id', 'desc')->get();

                endif;
            }

            $detalles = ['pregunta' => $preguntaNext];

		return $detalles;
	}

	public function listaExamenes()
	{
		$examenes = $this->getModel()->all();
		return $examenes;
	}


}