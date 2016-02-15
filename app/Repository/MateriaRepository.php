<?php namespace App\Repository;

use App\Http\Requests;
use App\Materia;
use Auth;

use Illuminate\Http\Request;

class MateriaRepository extends BaseRepository {


	public function getModel()
	{
		return new Materia();
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

         flash()->overlay('ha sido editada', 'La materia '. $materia->name);
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
}