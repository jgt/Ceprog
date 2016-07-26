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
use App;
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

	
	public function index(Request $request)
	{
		
	}

	
	public function create()
	{

	}

	public function createActividad($id)
	{

		$unidad = $this->unidadRepository->search($id);
		$rubricas = Rubrica::lists('name', 'id');

		return view('create.actividad', compact('unidad', 'rubricas'));
	}

	
	public function store(Maestro $request)
	{
		
		$datos = $this->actividadRepository->crearActividad($request);
		
		if($request->ajax())
		{
			return response()->json($datos);
		}

	}

	
	public function show($id, Request $request)
	{

		$actividad = $this->actividadRepository->search($id)->rubricas()->with('actividad')->get();
		
		if($request->ajax())
		{
			return response()->json($actividad);
		}	
   
	}

	
	public function edit($id, Request $request)
	{
		
		$actividad = $this->actividadRepository->search($id);
		$rubricas = $this->actividadRepository->getRubricas($id);
		$detalles = [

				'actividad' => $actividad,
				'rubricas' => $rubricas,
				'unidad' => $actividad->unidad
		];

		if($request->ajax()){

			return response()->json($detalles);
		}

		return view('edit.editactividad', compact('actividad', 'rubricas'));
	}

	
	public function update($id, Editact $request)
	{
		
		$this->actividadRepository->updateActividad($request, $id);
		return redirect()->back();
	}

	
	public function destroy($id)
	{
		
		$actividad = $this->actividadRepository->delete($id);
		return redirect()->back();
	}

	public function deleteActividad($id)
	{
		
		$actividad = $this->actividadRepository->delete($id);
		return redirect()->back();
	}

}
