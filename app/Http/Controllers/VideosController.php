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

class VideosController extends Controller {

	

	public function index($id, Request $request)
	{	
		$unidad = Unidad::find($id);

		if($request->ajax())
		{
			return response()->json($unidad);
		}

		return view('dropzone', compact('unidad'));
	}


	public function showVideos($id, Request $request)
	{

		$unidad = Unidad::find($id);

		$videos = $unidad->videos()->get();

		if($request->ajax())
		{
			return response()->json($videos);
		}

	}


	public function allVideos($id, Request $request)
	{

		$tutorial = Tutorial::find($id);
		
		if($request->ajax())
		{
			return response()->json($tutorial);
		}
	}


	public function storeSubir($id, Request $request)
	{
		$dir = public_path().'/uploads';

		$unidad = Unidad::find($id);

		$file = $request->file('archivo');
			
			$fileName = $file->getClientOriginalName();
			$entry = Video::where('original_filename',  $fileName)->get();
			
			$ruta = $file->move($dir, $fileName);

			$video = Video::create([

				'mime' => $file->getClientMimeType(),
				'original_filename' => 	$fileName,
				'filename' => $file->getfilename(),
				'ruta' => $ruta,
				'unidad_id' => $id,

				]);

			$video->save();
	}

	public function download($filename){
	
		$public_path = public_path();
		$entry = Video::where('original_filename', '=', $filename)->firstOrFail();
     	$file =  $public_path.'/uploads/'.$filename;

		return response()->download($file);
	}

	public function delete($id, Request $request)
	{

		$video = Video::find($id);

		$public_path = public_path();

		$file = $public_path.'/uploads/'.$video->original_filename;
		
		if($file){


			Archivo::delete($file);
			$video->delete();

		}

		if($request->ajax())
		{

			return response()->json($video);
		}
	}


	public function tutorial()
	{

		return view('tutorial');
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
