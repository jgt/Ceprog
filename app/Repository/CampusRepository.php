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
		$campu = $this->search($id);

		foreach($campu->semestres as $semestre)
		{
			foreach ($semestre->materias as $materia) {
				
				return $materia->has('resultados')->get();
			}
		}
	}
	
}