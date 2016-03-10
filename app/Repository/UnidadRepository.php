<?php namespace App\Repository;


use App\Http\Requests;
use App\Unidad;

use Illuminate\Http\Request;

class UnidadRepository extends BaseRepository {


	public function getModel()
	{

		return new Unidad();
	}


	public function crearUnidad(Request $request)
	{

		$unidad = Unidad::create($request->all());
		
		return $unidad;

	}

	public function updateUnidad(Request $request, $id)
	{

		$unidad = $this->search($id);
		$unidad->update($request->all());

		return $unidad;
	}

	public function subtemas(Request $request, $id)
	{

		$unidad = $this->search($id);
		$subtemas = $unidad->subtemas()->get();
		$imagenes = [];
		foreach ($subtemas as $subtema) {
			
			 $imagenes = $subtema->imagenes()->get();
			 return $imagenes;
		}

		return $imagenes;
	}

}