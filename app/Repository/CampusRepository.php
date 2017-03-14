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
		$campus = $this->getModel()->find($id);
		$semestres = $campus->semestres()->with(['materias' => function($query) { 

			$query->has('resultados'); 

		}])->get();

		foreach($semestres as $semestre)
		{	
			foreach($semestre->materias as $materia) {
				
				$mta[] = $materia;

			}

		}

		return $mta;
	}

	public function alumnosTotales($id)
	{
		$campus = $this->getModel()->find($id);
		$alm = 0;
		$semestres = $campus->semestres()->with(['materias' => function($query) { 

			$query->has('resultados')->with('semestre.users'); 

		}])->get();

		foreach ($semestres as $semestre) {
			
			foreach($semestre->users as $user) {
				
				$alm +=$user->resultadoDocenteUser->count();

			}
		}

		return $alm;
	}
	
}