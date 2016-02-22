<?php namespace App\Repository;


use App\Calificacion;
use Auth;

class CalificacionRepository extends BaseRepository {


	public function getModel()
	{

		return new Calificacion();
	}
	public function notasActividades($actividadesId)
	{
		return  $this->newQuery()->where('user_id',Auth::user()->id)->whereIn('actividad_id',$actividadesId)->get();
	
	} 

	public function promedioActividad($actividadesId)
	{
		$total =0;
		foreach(

			$this->newQuery()->where('user_id',Auth::user()->id)
			->whereIn('actividad_id',$actividadesId)
			->lists('promedio') As $promedios):

				$total += $promedios;

			endforeach;
		return $total ;
	}


	public function notaGlobalActividades($actividadesId)
	{

		return $this->newQuery()->whereIn('actividad_id', $actividadesId)->get();
	}

	public function promedioGlobalActividades($actividadesId)
	{

		$total=0;
		foreach($this->newQuery()->whereIn('actividad_id', $actividadesId)->lists('promedio') as $promedios):

			$total += $promedios;

		endforeach;
		return $total;
	}

	public function calificacionAlumnos($id)
	{

		$calificacion = $this->search($id);

		foreach ($calificacion->rubricas as $rubrica) {
			
			$detalles = [ 'rubrica' => $rubrica->name, 'nota' => $rubrica->pivot->nota];

			return $detalles;
		}

		

	}

}