<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;
use App\Unidad;
use App\Tutorial;
use App;
use File as Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as respuesta;
use App\Repository\VideoRepository;
use App\Repository\UnidadRepository;

class VideosController extends Controller {

	private $videoRepository;
	private $unidadRepository;

	public function __construct(VideoRepository $videoRepository, UnidadRepository $unidadRepository)
	{
		$this->videoRepository = $videoRepository;
		$this->unidadRepository = $unidadRepository;
	}
	
	public function index($id, Request $request)
	{	
		$unidad = $this->unidadRepository->search($id);
		return response()->json($unidad);
	}

	public function showVideos($id, Request $request)
	{
		$videos = $this->unidadRepository->search($id)->videos()->get();
		return response()->json($videos);
	}

	public function allVideos($id, Request $request)
	{
		$tutorial = Tutorial::find($id);
		return response()->json($tutorial);
	}

	public function storeSubir($id, Request $request)
	{
		return $this->videoRepository->subirVideo($id, $request);
	}

	public function download($filename)
	{
		return response()->download($this->videoRepository->descargar($filename));
	}

	public function delete($id, Request $request)
	{
		return $this->videoRepository->borrar($id, $request);
	}

	public function storeTutorial(Request $request)
	{

		$dir = public_path().'/tutoriales';
		$file = $request->file('archivo');

			$fileName = $file->getClientOriginalName();

			$ruta = $file->move($dir, $fileName);

			$tutorial = Tutorial::create([

				'mime' => $file->getClientMimeType(),
				'original_filename' => 	$fileName,
				'filename' => $file->getfilename(),
				'ruta' => $ruta

				]);

			$tutorial->attachRole($request->get('role_list'));
			$tutorial->save();

	}

	public function allTutorial(Request $request)
	{
		$tutoriales = Tutorial::with('roles')->get();

		if($request->ajax())
		{

			return response()->json($tutoriales);
		}
	}

	public function dwTutorial($fileName)
	{
		$public_path = public_path();
		$entry = Tutorial::where('original_filename', '=', $fileName)->firstOrFail();
     	$file =  $public_path.'/tutoriales/'.$fileName;

     	return response()->download($file);

	}

	public function dlTutorial($id, Request $request)
	{

		$tutorial = Tutorial::find($id);

		$public_path = public_path();

		$file = $public_path.'/tutoriales/'.$tutorial->original_filename;
		
		if($file){


			Archivo::delete($file);
			$tutorial->delete();

		}

		if($request->ajax())
		{

			return response()->json($tutorial);
		}
	}

}
