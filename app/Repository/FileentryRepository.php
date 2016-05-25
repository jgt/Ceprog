<?php namespace App\Repository;

use App\Http\Requests\Peticion;
use Illuminate\Http\Request as Asignacion;
use Illuminate\Support\Facades\Request;

use App\Fileentry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Auth;
use Input;

class FileentryRepository extends BaseRepository {


	public function getModel()
	{

		return new Fileentry();
	}

	public function file(Peticion $request, $id)
	{

		$user = Auth::user()->id;
		$file = Request::file('archivo');
		$nombre = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$exists = Storage::disk('local')->exists($nombre);
	
			if (!($exists)) {

			Storage::disk('local')->put($nombre,  File::get($file));
			$entry = Fileentry::create([

			'mime' => $file->getClientMimeType(),
			'original_filename' => 	$file->getClientOriginalName(),
			'filename' => $nombre,
			'mensaje' => Input::get('mensaje'),
			'usuario' => Input::get('usuario'),
			'actividad_id'   => $id,
			'user_id'        => $user

			]);

		$entry->save();

		return $entry;

		}else if($exists){


			$contador = $user + rand(1, 10);
			$modificacion = $nombre . $contador;
			Storage::disk('local')->put($modificacion,  File::get($file));
			$change = Fileentry::create([

			'mime' => $file->getClientMimeType(),
			'original_filename' => 	$modificacion,
			'filename' => $modificacion,
			'mensaje' => Input::get('mensaje'),
			'usuario' => Input::get('usuario'),
			'actividad_id'   => $id,
			'user_id'        => $user

			]);

		$change->save();

		return $change;
				
		}

	}

	public function descargar($filename)
	{

		return Fileentry::where('filename', '=', $filename)->firstOrFail();

	}

	public function borrar($filename)
	{

		$archivo = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$exists = Storage::disk('local')->exists($archivo->filename);

		if ($exists) {
			

			Storage::delete($archivo->filename);
			$archivo->delete();


			flash()->overlay('Ha sido borrado sactifactoriamente', 'El archivo '.$archivo->filename);

		}
	}

	public function archivosUser($fileentryId)
	{

		return  $this->newQuery()->where('user_id',Auth::user()->id)->whereIn('actividad_id',$fileentryId)->get();
	
	}

}