<?php namespace App\Repository;

use App\Http\Requests;
use App\User;
use App\Materia;
use App\Respuesta;
use App\RespuestaUser;
use Auth;

use Illuminate\Http\Request;

class MateriaRepository extends BaseRepository {


	public function getModel()
	{
		return new Materia();
	}

	public function listExamen($id)
	{
		$materia = $this->search($id);
		$examenes = $materia->examenesDocente()->get();
		return $examenes;
	}


	public function listaMaterias(Request $request)
	{

		return	Materia::name($request->get('name'))->paginate(5);
	}

	public function crearMateria(Request $request)
	{

		 $materia = Materia::create($request->all());

         flash()->overlay('Fue creada sastifactoriamente', 'La materia '. $materia->name);
	}

	public function updateMateria(Request $request, $id)
	{

		 $materia = $this->search($id);

         $materia->update($request->all());

         return $materia;
	}

	public function deleteMateria($id)
	{

		$materia = $this->search($id);

		$materia->delete();

		flash()->overlay('ha sido borrado', 'la materia ' . $materia->name);
	}

	public function getPromedioMateria($id)
	{

		$calificaciones = Auth::user()->calificaciones()->get();

		$promedio = 0;


		foreach($calificaciones as $calificacion)
		{

			if (Auth::user()->hasNota(Auth::user(), $calificacion->actividad)) {
				
				$promedio += $calificacion->promedio;
			}

				
		}

		return $promedio;
	}

	public function actMat($materia)
	{
		$course = $this->search($materia);
		 $actividadesMateria = $course->with('unidades.actividades.calificaciones')->where('id',$materia)
        ->get();
        foreach ($actividadesMateria as  $value) {
            foreach ($value->unidades as  $unidad) {
            	
                 foreach ($unidad->actividades as  $actividad) {
                  $actividades[] = $actividad;
                 } 
            }
        }    
        return $actividades;
	}

	public function sumaExamenes($id, $materia)
	{	

		$users = User::find($id);
		$course = $this->search($materia);
		$totalExamen = 0;
		$examenesMateria = $course->with('examenes.resultados')->where('id',$materia)
        ->get();
 
        foreach ($examenesMateria as  $examen) {
            foreach ($examen->examenes as  $examen) {
                foreach ($examen->resultados as  $resultado) {
                   
                    if($resultado->user_id == $users->id):
                      $totalExamen += $resultado->resultado;
                    endif;
                }
               
            }
           
        }
        return $totalExamen;
	}

}