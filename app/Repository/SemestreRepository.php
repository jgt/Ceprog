<?php namespace App\Repository;


use App\Http\Requests;
use App\Semestre;

use Illuminate\Http\Request;

class SemestreRepository extends BaseRepository {


	public function getModel()
	{

		return new Semestre();
	}


	public function crearSemestre(Request $request)
	{

		$semestre = Semestre::create($request->all());

     	return $semestre;
	}

	public function updateSemestre(Request $request, $id)
	{

		$semestre = $this->search($id);

  	    $semestre->update($request->all());

  	    return $semestre;

	}

}