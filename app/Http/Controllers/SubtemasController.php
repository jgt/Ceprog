<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subtemas;
use App\Unidad;
use App\Imagenes;
use File as Archivo;

class SubtemasController extends Controller
{
    

	public function storeSubtemas(Request $request)
	{

		$subtemas = Subtemas::create($request->all());

		if($request->ajax())
		{
			return response()->json($subtemas);
		}
	}

	public function editSubtemas($id, Request $request)
	{

		$unidad = Unidad::find($id);
		$subtemas = $unidad->subtemas()->get();

		if($request->ajax())
		{

			return response()->json($subtemas);
		}

	}

	public function updateSubtemas($id, Request $request)
	{

		$subtema = Subtemas::find($id);

		$subtema->update($request->all());

		if($request->ajax())
		{

			return response()->json($subtema);
		}

	}

	public function showSubtema($id, Request $request)
	{

		$subtema = Subtemas::find($id);

		if($request->ajax())
		{
			return response()->json($subtema);
		}
	}


	public function deleteSubtemas($id, Request $request)
	{

		$subtema = Subtemas::find($id);
		$subtema->delete($id);
	}



	public function imagenSubtema($id, Request $request)
	{
		$dir = public_path().'/uploads';

		$unidad = Subtemas::find($id);

		$file = $request->file('archivo');
			
			$fileName = $file->getClientOriginalName();
			$entry = Imagenes::where('original_filename',  $fileName)->get();
			
			$ruta = $file->move($dir, $fileName);

			$imagen = Imagenes::create([

				'mime' => $file->getClientMimeType(),
				'original_filename' => 	$fileName,
				'filename' => $file->getfilename(),
				'ruta' => $ruta,
				'subtema_id' => $id,

				]);

			$imagen->save();
	}


	public function listImagenes($id, Request $request)
	{

		$subtema = Subtemas::find($id);
		$imagenes = $subtema->imagenes()->get();
		

		if($request->ajax())
		{
			return response()->json($imagenes);
		}

	}


	public function borrarImg($id, Request $request)
	{

		$imagen = Imagenes::find($id);

		$public_path = public_path();

		$file = $public_path.'/uploads/'.$imagen->original_filename;
		
		if($file){


			Archivo::delete($file);
			$imagen->delete();

		}

		if($request->ajax())
		{

			return response()->json($imagen);
		}
	}

}
