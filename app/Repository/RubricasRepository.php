<?php namespace App\Repository;

use App\Rubrica;

class RubricasRepository extends BaseRepository {


	public function getModel()
	{

		return new Rubrica();
	}


}