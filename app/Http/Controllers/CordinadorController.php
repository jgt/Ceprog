<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cordinador;
use App\Http\Requests\EditCordinador;

use App\User;
use App\Materia;
use App\Actividad;
use Bican\Roles\Models\Role;
use Auth;

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

	public function index(Request $request)
	{

		$users = $this->userRepository->listaUser($request);
		return view('cordinador.listmaestros', compact('users'));
	}

	public function create()
	{
		$materias = $this->materiaRepository->searchList();
		return view('cordinador.create.maestro', compact('materias'));
	}

	
	public function store(Cordinador $request)
	{	
		$this->userRepository->crearMaestro($request);
		return redirect('cordinador');
	}

	
	public function show($id)
	{

		$maestro = $this->userRepository->search($id);
		$planeaciones = $this->userRepository->getPlaneaciones($id);
		return view('cordinador.planeaciones', compact('planeaciones'));
	}

	
	public function edit($id)
	{
		$maestro = $this->userRepository->search($id);
		$materias = $this->materiaRepository->searchList();
		return view('cordinador.edit.maestro', compact('maestro', 'materias'));
	}

	
	public function update($id, EditCordinador $request)
	{

	  $this->userRepository->updateMaestro($request, $id);
      return redirect('cordinador');
	}


	public function destroy($id)
	{
		
		$this->userRepository->delete($id);
		return redirect('cordinador');
	}

	public function materiaCordinador(Request $request)
	{

		$materias = $this->materiaRepository->listaMaterias($request);
		return view('cordinador.listamaterias', compact('materias'));
	}

	public function actividadCordinador($id)
	{

		$maestro = $this->userRepository->search($id);
		$materias = $this->userRepository->getMaterias($id);
		return view('cordinador.actividades', compact('materias', 'maestro'));


	}

	public function actividadMateria($id)
	{
		$materia = $this->materiaRepository->search($id);
		$actividades = $this->materiaRepository->getActividades($id);
		return view('cordinador.actividadesMaterias', compact('actividades'));

	}

	public function notaCordinador($id)
	{

		$actividad = $this->actividadRepository->search($id);
		return view('cordinador.notaCordinador', compact('actividad'));
	}


	public function notaRubricaCordinador($id)
	{

		 $actividad = $this->actividadRepository->search($id);
    	 $rubricas = $this->actividadRepository->getRubricas($id);
    	 $promedio = $this->actividadRepository->getNota($id);
   		 return view('cordinador.notarubricascordinador', compact('actividad', 'promedio'));
	}

	public function videoCordinador($id)
	{

		$materia = $this->materiaRepository->search($id);
		$videos = $this->materiaRepository->getVideos($id);
		return view('cordinador.dropzone', compact('videos'));
	}


	public function archivoCordinador($id)
	{

		$actividad = $this->actividadRepository->search($id);
		$entries = $this->actividadRepository->getApoyos($id);
		return view('cordinador.archivoCordinador', compact('entries', 'actividad'));

	}
	
}
