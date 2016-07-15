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
	
	public function enviado(Asignacion $request)
	{

		$archivos = $this->userRepository->archivosUser($request);
		return view('file', compact('archivos'));

	}

	public function material($id, Asignacion $request)
	{
		$actividad = $this->actividadRepository->search($id);
		$archivos = $this->actividadRepository->getApoyos($id);

		if($request->ajax())
		{
			return response()->json($archivos->toArray());
		}

		return view('archivo', compact('actividad', 'archivos'));
	}


	public function create($id, Asignacion $request)
	{
		
		$user = Auth::user();
		$actividad = $this->actividadRepository->search($id);
		
		if($request->ajax())
		{

			return response()->json($user);
		}
	}

	public function add($id, Asignacion $request) 
	{
 		
		$apoyo = $this->apoyoRepository->apoyo($request, $id);
		
		if($request->ajax())
		{
			return response()->json($apoyo);
		}
		
	}

	public function get($filename, Asignacion $request){
	
		$entry = $this->apoyoRepository->descargar($filename);
		$file = Storage::disk('local')->get($entry->filename); 

		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}


	public function borrarM($filename)
	{

		$this->apoyoRepository->deleteApoyo($filename);
		return redirect()->back();
	}


}
