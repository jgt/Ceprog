<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

use Auth;
use App\Carrera;
use App\User;
use App\ImagenUser;

use Illuminate\Http\Request as Peticion;

class ResetController extends Controller {

	


	public function reset(Peticion $request)
	{

		$user = Auth::user();

		if($request->ajax())
		{
			return response()->json($user);
		}
	}

	public function addImg(Peticion $request, $id)
	{
		$user = User::find($id);
		$imagenes = $user->imagenes()->get();
	
		if($request->ajax())
		{
			return response()->json($imagenes);
		}
	}



	public function resetC(Peticion $request, $id)
   {	

   	   $dir = public_path().'/imagen';
   	  $users = User::find($id);
      $users->update($request->all());
   	  $user = Auth::user()->id;
   	  $file = Request::file('archivo');	
   	  $nombre = $file->getClientOriginalName();
   	  $ruta = $file->move($dir, $nombre);
	  $extension = $file->getClientOriginalExtension();
	  	$img = ImagenUser::create([
	  		'mime' => $file->getClientMimeType(),
	  		'ruta' => $ruta,
			'original_img' => $file->getClientOriginalName(),
			'img' => $nombre,
			'user_id' => $user
	  		]);
	  		$img->save();
	  		if($request->ajax())
			   {
			   	
			   	return response()->json($img);
			   }


   }

}
