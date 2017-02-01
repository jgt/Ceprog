<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cordinador;
use App\Http\Requests\EditCordinador;
use App\Http\Requests\rptSemestral;

use App\Http\Requests\DtaM;
use App\User;
use App\Materia;
use App\Actividad;
use App\DatosDocente;
use App\Seguimiento;
use App\Campus;
use Bican\Roles\Models\Role;
use Auth;
use Datatables;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Repository\MateriaRepository;
use App\Repository\ActividadRepository;

class CordinadorController extends Controller {


	private $userRepository;
	private $materiaRepository;
	private $actividadRepository;

	public function __construct(

		UserRepository $userRepository,
		MateriaRepository $materiaRepository,
		ActividadRepository $actividadRepository)
	{

		$this->userRepository = $userRepository;
		$this->materiaRepository = $materiaRepository;
		$this->actividadRepository = $actividadRepository;

	}

	public function listDocente(Request $request)
	{

		$users = DatosDocente::with('user.materias.seguimiento', 'user.materias.semestre.carrera')->select('datos_docentes.*');
		return Datatables::of($users)->make(true);

	}

	public function create()
	{
		$materias = $this->materiaRepository->getModel()->get();
		return response()->json($materias);
	}

	public function store(Request $request)
	{
		$user = $this->userRepository->crearMaestro($request);
		$campus = Campus::get();
		$detalles = [

			'user' => $user,
			'campus' => $campus
		];
		return response()->json($detalles);
	}

	public function datosDocente(DtaM $request)
	{
		$user = $this->userRepository->datosMaestro($request);
		return response()->json($user);
	}
			
	public function update($id, EditCordinador $request)
	{

	  $this->userRepository->updateMaestro($request, $id);
      return redirect('cordinador');
	}

	public function crearReporteSem(rptSemestral $request)
	{
		$reporte = Seguimiento::create($request->all());
		return response()->json($reporte);
	}
	
}
