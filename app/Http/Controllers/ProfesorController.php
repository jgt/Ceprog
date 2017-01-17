<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Maestro;
use App\Http\Requests\Editact;
use Bican\Roles\Models\Permission;
use App\Rubrica;
use App\Materia;
use App\Actividad;
use App\User;
use Auth;

use Illuminate\Http\Request;
use App\Repository\MateriaRepository;
use App\Repository\ActividadRepository;
use App\Repository\UserRepository;
use App\Repository\UnidadRepository;

class ProfesorController extends Controller {

	private $materiaRepository;
	private $actividadRepository;
	private $userRepository;
	private $unidadRepository;

	public function __construct(

		MateriaRepository $materiaRepository,
		ActividadRepository $actividadRepository,
		UserRepository $userRepository,
		UnidadRepository $unidadRepository)
	{

		$this->materiaRepository = $materiaRepository;
		$this->actividadRepository = $actividadRepository;
		$this->userRepository = $userRepository;
		$this->unidadRepository = $unidadRepository;

	}

	public function store(Maestro $request)
	{
		$datos = $this->actividadRepository->crearActividad($request);
		return response()->json($datos);
	}

	public function show($id, Request $request)
	{
		$actividad = $this->actividadRepository->show($id);
		return response()->json($actividad);   
	}

	public function edit($id)
	{
		$actividad = $this->actividadRepository->edit($id);
		return response()->json($actividad);
	}

	public function update($id, Editact $request)
	{
	  	$actividad = $this->actividadRepository->updateActividad($request, $id);
		return response()->json($actividad);
	}

	public function deleteActividad($id)
	{
		return $this->actividadRepository->delete($id);
	}

	public function planPdf($id)
	{
		return $this->actividadRepository->convertir($id);
	}

}
