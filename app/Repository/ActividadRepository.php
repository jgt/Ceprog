<?php 


namespace App\Repository;

use App\Actividad;
use App\Http\Requests\Maestro;
use App\Http\Requests\Editact;
use Auth;
use App;

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
		return Actividad::create($request->all());
	}

	public function show($id)
	{
		return $this->search($id)->where('id', $id)->with('rubricas')->get();
	}

	public function edit($id)
	{
		return $detalles = [

			'actividad' => $this->search($id),
			'rubricas' => $this->getRubricas($id),
			'unidad' => $this->search($id)->unidad
		];
	}

	public function updateActividad(Editact $request, $id)
	{
		$actividad = $this->search($id);
		$actividad->update($request->all());
		return $actividad;
	}

	public function delete($id)
	{
		$this->search($id)->delete($id);
	}

	public function calAct($id)
	{
		$actividad = $this->search($id);
		$users = $actividad->where('id', $id)->with('unidad.materia.semestre.users.calificaciones.rubricas')->get();

		return $users;
	}

	public function convertir($id)
	{ 
         $pdf = App::make('dompdf.wrapper');
         $actividad = $this->search($id);
         $customPaper = array(0,0,950,950);
         $paper_orientation = 'landscape';
         $pdf->setPaper($customPaper,$paper_orientation);
         $pdf->loadview('showactividad', compact('actividad'));
         return $pdf->stream();	
	}
}