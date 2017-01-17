<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App;
use App\Actividad;
use Illuminate\Http\Request;
use App\Http\Requests\EditUnidad;
use App\Http\Requests\Unidad as plt;
use App\Repository\MateriaRepository;
use App\Repository\UnidadRepository;

class DisenoController extends Controller {


	private $materiaRepository;
	private $unidadRepository;

	public function __construct(

		MateriaRepository $materiaRepository, 
		UnidadRepository $unidadRepository)
	{

		$this->materiaRepository = $materiaRepository;
		$this->unidadRepository = $unidadRepository;
	}

	
	public function planeacion($id, Request $request)
	{	

		$materias = $this->materiaRepository->search($id);
		$users = Auth::user();
		$detalles = [

			'materia' => $materias,
			'users' => $users,
			'semestre' => $materias->semestre

		];

		return response()->json($detalles);

	}

	public function storePlan(plt $request)
	{
		$unidad = $this->unidadRepository->crearUnidad($request);
		return response()->json($unidad);

	}

	public function listPlan($id, Request $request)
	{
		$unidades = $this->materiaRepository->search($id)->unidades()->get();
		return response()->json($unidades);		
	}

	public function editplan($id, Request $request)
	{
		$unidad = $this->unidadRepository->search($id);
		return response()->json($unidad);
	}


	public function updateplan($id, Request $request)
	{
		$update = $this->unidadRepository->updateUnidad($id, $request);
		return response()->json($update);
	}

	public function baseTeorica($id, Request $request)
	{
		$unidades = $this->materiaRepository->search($id)->unidades()->get();
		return response()->json($unidades);
	}

	public function baseTeoricaSubTemas($id)
	{
		return $this->unidadRepository->baseTeoricaSubTemas($id);
	}

}
