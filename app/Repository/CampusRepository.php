<?php  

namespace App\Repository;

use App\Campus;

class CampusRepository extends BaseRepository {

	public function getModel()
	{

		return new Campus();
	}
	

	public function materiaCampus($id)
	{
		$semestres = $this->search($id)->semestres;

		foreach($semestres as $semestre)
		{
			foreach($semestre->materias as $materia) {
				
				if($materia->has('resultados'))
				{
					$mta[] = $materia;
				}
			}

		}

		return $mta;
	}
	
}