<?php namespace App\Repository;


use App\Http\Requests;
use App\Unidad;
use App\Imagenes;

use Illuminate\Http\Request;

class UnidadRepository extends BaseRepository {

	protected $detalles = [];

	public function getModel()
	{

		return new Unidad();
	}


	public function crearUnidad(Request $request)
	{
		return Unidad::create($request->all());
	}

	public function updateUnidad($id, Request $request)
	{	
		$unidad = $this->search($id);
		$unidad->update($request->all());
		return $unidad;
	}

	public function subtemas($id)
	{
		return $this->subTemasImg($id);	
	}

	public  function baseTeoricaSubTemas($id)
    {
    	$unidad = $this->subTemasImg($id);
		$videos = $this->videosUnidad($id);
		$detalles = [
		
			'unidad' => $unidad,
			'videos' => $videos
		];
			
		return response()->json($detalles);
    }

	protected function subTemasImg($id)
    {
        return $this->search($id)->where('id', $id)->with('subtemas.imagenes')->get();
    }

    protected function videosUnidad($id)
    {
    	return $this->search($id)->videos()->get();
    }

}