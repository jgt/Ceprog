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
		return response()->json($user);
	}

	public function addImg(Peticion $request, $id)
	{
		$user = User::find($id);
		$imagenes = $user->imagenes()->get();
		return response()->json($imagenes);
	}

	public function resetC(Peticion $request, $id)
   {	
   	  $users = User::find($id);
      $users->update($request->all());
   	  $imagen = new ImagenUser;
   	  $dir = public_path().'/imagen';
   	  $user = Auth::user()->id;
   	  $file = Request::file('archivo');	
   	  $nombre = $file->getClientOriginalName();
	  $extension = $file->getClientOriginalExtension();

	  if(!$imagen->hasImg($user))
	  {
	  	$ruta = $file->move($dir, $nombre);
		$img = ImagenUser::create([
		  	'mime' => $file->getClientMimeType(),
		  	'ruta' => $ruta,
			'original_img' => $file->getClientOriginalName(),
			'img' => $nombre,
			'user_id' => $user

	  	]);
	  }else{

	  	abort('404', 'ya tiene una foto.');
	  }	
		return response()->json($img);

   }

}
