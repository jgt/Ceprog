<?php namespace App\Repository;

use App\Http\Requests;
use App\Carrera;

use Illuminate\Http\Request;

class CarreraRepository extends BaseRepository {

	public function getModel()
	{

		return new Carrera;
	}

	
	public function listaCarreras(Request $request)
	{

		 return Carrera::name($request->get('name'))->orderBy('created_at', 'DESC')->paginate(5);

	}

	public function crearCarrera(Request $request)
	{


		$plan = Carrera::create($request->all());
       
        flash()->overlay('Fue creado sastifactoriamente', 'El plan '. $plan->plan);
	}


	public function updateCarrera(Request $request, $id)
	{

		$carrera = $this->search($id);

        $carrera->update($request->all());

        flash()->overlay('Fue editada correctamente', 'La carrera '. $carrera->name);
	}

	public function deleteCarrera($id)
	{
		$carrera = $this->search($id);
		$carrera->delete();
		flash()->overlay('ha sido borrado', 'El usuario ' . $carrera->name);
	}

}