<?php namespace App\Repository;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request as Asignacion;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Peticion;
use App\Apoyo;
use Auth;
use Input;
class ApoyoRepository extends BaseRepository {


	public function getModel()
	{

		return new Apoyo();
	}


	public function apoyo(Asignacion $request, $id)
	{

		$user = Auth::user()->id;
		$actividad = $this->search($id);
		$file = Request::file('archivo');
		$nombre = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$exists = Storage::disk('local')->exists($nombre);

		if (! $exists) {
			
			Storage::disk('local')->put($nombre, File::get($file));

			$entry = Apoyo::create([

			'mime' => $file->getClientMimeType(),
			'original_filename' => 	$file->getClientOriginalName(),
			'filename' => $nombre,
			'actividad_id'   => $id,
			'user_id' => $user

			]);

		$entry->save();
		
		}
	}

	public function descargar($filename)
	{

		return Apoyo::where('filename', '=', $filename)->firstOrFail();
	}


	public function deleteApoyo($filename)
	{

		$archivo = $this->descargar($filename);
		$exists = Storage::disk('local')->exists($archivo->filename);

		if ($exists) {
			

			Storage::delete($archivo->filename);
			$archivo->delete();


			flash()->overlay('Ha sido borrado sactifactoriamente', 'El archivo '.$archivo->filename);

		}
	}
}