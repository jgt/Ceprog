<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Peticion;
use App\Apoyo;
use App\Fileentry;
use App\Actividad;
use App\User;
use Request;
use Input;
use Auth;
use App;

use Illuminate\Http\Request as Asignacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Repository\UserRepository;
use App\Repository\ActividadRepository;
use App\Repository\ApoyoRepository;


class FileEntryController extends Controller {


	private $actividadRepository;
	private $userRepository;
	private $apoyoRepository;

	public function __construct(

		UserRepository $userRepository, 
		ActividadRepository $actividadRepository,
		ApoyoRepository $apoyoRepository)
	{

		$this->actividadRepository = $actividadRepository;
		$this->userRepository = $userRepository;
		$this->apoyoRepository = $apoyoRepository;

	}

	public function material($id, Asignacion $request)
	{
		$actividad = $this->actividadRepository->search($id);
		$archivos = $this->actividadRepository->getApoyos($id);
		return response()->json($archivos->toArray());
	}

	public function create($id, Asignacion $request)
	{
		
		$actividad = $this->actividadRepository->search($id)->where('id', $id)->with('unidad')->get();
		return response()->json($actividad);
	}

	public function add($id, Asignacion $request) 
	{
 		
		$apoyo = $this->apoyoRepository->apoyo($request, $id);
		return response()->json($apoyo);
	}

	public function get($filename){
	
		$file = $this->apoyoRepository->descargar($filename);
		return response()->download($file);
	}

	public function borrarM($id)
	{
		$this->apoyoRepository->deleteApoyo($id);
	}

}
