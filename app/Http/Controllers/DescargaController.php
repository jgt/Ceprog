<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Peticion;
use App\Materia;
use App\Fileentry;
use App\User;
use App\Actividad;
use Auth;
use Request;
use Input;
use App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request as Asignacion;
use App\Repository\UserRepository;
use App\Repository\ActividadRepository;
use App\Repository\FileentryRepository;

class DescargaController extends Controller {


	private $userRepository;
	private $actividadRepository;
	private $fileentryRepository;

	public function __construct(

		UserRepository $userRepository, 
		ActividadRepository $actividadRepository,
		FileentryRepository $fileentryRepository)
	{

		$this->userRepository = $userRepository;
		$this->actividadRepository = $actividadRepository;
		$this->fileentryRepository = $fileentryRepository;

	}

	public function index($id, Request $request)
	{
		$archivos = $this->actividadRepository->search($id)
			->where('id', $id)
			->with('fileentries')
			->whereHas('fileentries', function($query){
				$query->where('user_id', Auth::user()->id);
			})
			->get();

		return response()->json($archivos);
		
	}


	public function create($id)
	{	
		$users = Auth::user();
		$actividad = $this->actividadRepository->search($id);
		return view('fileentries.descarga', compact('actividad', 'users'));
	}

	public function add($id, Peticion $request) {

		$actividad = $this->actividadRepository->search($id);
		$archivos= $this->fileentryRepository->arch($request, $id);
		
		if($request->ajax())
		{
			return response()->json($archivos);
		}

	}

	public function get($filename){

	
	    $entry = $this->fileentryRepository->descargar($filename);
	    $file = Storage::disk('local')->get($entry->filename);
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}

	public function borrar($filename)
	{

		$this->fileentryRepository->borrar($filename);
		return redirect()->back();
	}

}
