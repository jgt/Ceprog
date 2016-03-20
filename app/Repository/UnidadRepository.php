<?php namespace App\Repository;


use App\Http\Requests;
use App\Unidad;
use App\Imagenes;

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

		$unidad = $this->search($id); // encuentro la unidad
		$imagenes= $unidad->where('id', $id)->with('subtemas', 'subtemas.imagenes')->get(); // devuelve todas las imagenes que tiene los subtemas de la unidad

		return $imagenes;
		
	}

}