<?php namespace App\Repository;


use App\Examen;
use App\Pregunta;

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

}