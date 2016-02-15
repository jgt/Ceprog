<?php namespace App\Repository;


use App\Actividad;
use App\Http\Requests\Maestro;
use App\Http\Requests\Editact;
use Auth;

class ActividadRepository extends BaseRepository {


	public function getModel()
	{

		return new Actividad();
	}

	public function getNota($id)
	{

		 $promedio = 0; 
         $actividad = $this->search($id);
         $rubricas =  $this->getRubricas($id);

       foreach ($rubricas as $rubrica) {
            foreach ($rubrica->calificaciones as $calificacion) {

                $promedio += $calificacion->pivot->nota;
            }
        }
        
		return $promedio;
	}

	public function crearActividad(Maestro $request)
	{

		$profesor = Actividad::create($request->all());
		return $profesor;

	}

	public function updateActividad(Editact $request, $id)
	{

		$actividad = $this->search($id);

		$actividad->update($request->all());

		flash()->overlay('Ha sido asignado/editado correctamente ', 'La actividad '. $actividad->actividad);
	}

	public function delete($id)
	{

		$profesor = $this->search($id);

		$profesor->delete($id);

		flash()->overlay('Ha sido borrado', 'La actividad ' . $profesor->actividad);

	}

	public function notaAct($id)
	{

		$actividad = $this->search($id);
		$cal = [];

		foreach ($actividad->calificaciones as $calificacion) {
      
        if($calificacion->user->is('alm'))
        {	

        	$cal = $calificacion;
        }


    }

    	return $cal;
	}

}