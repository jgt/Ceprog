<?php namespace App\Repository;

use App\Http\Requests\Peticion;
use Illuminate\Http\Request as Asignacion;
use Illuminate\Support\Facades\Request;

use App\Fileentry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use File as Archivo;
use Illuminate\Http\Response;
use Auth;
use Input;

class FileentryRepository extends BaseRepository {


	public function getModel()
	{

		return new Fileentry();
	}

	public function arch(Peticion $request, $id)
	{

		$user = Auth::user()->id;
		$dir = public_path().'/respuestas/';
		$file = $dir.$this->filename($request);
	
		if (!file_exists($file)) {

			$this->movePath($request);
			return Fileentry::create([

			'mime' => $this->type($request),
			'original_filename' => 	$this->filename($request),
			'filename' => $this->filename($request),
			'usuario' => Input::get('usuario'),
			'actividad_id'   => $id,
			'user_id'        => $user

			]);

		}else{

			return abort(404, 'El archivo ya existe');			
		}

	}

	protected function file(Asignacion $request)
    {
        return $request->file('archivo');
    }

    protected function path()
    {
        return public_path().'/respuestas';
    }

    protected function fileName(Asignacion $request)
    {
        return $this->file($request)->getClientOriginalName();
    }

    protected function type(Asignacion $request)
    {
        return $request->file('archivo')->getClientMimeType();
    }

	protected function movePath(Asignacion $request)
    {
        return $this->file($request)->move($this->path(), $this->filename($request));
    }

	public function descargar($filename)
	{

		return Fileentry::where('filename', '=', $filename)->firstOrFail();

	}

	public function borrar($id)
	{
		$file = $this->ruta($this->search($id)->filename);
        Archivo::delete($file);
        $this->search($id)->delete();
	}

	public function ruta($filename)
	{
		$archivo = public_path().'/respuestas/'.$filename;
        return $archivo;
	}

	public function archivosUser($fileentryId)
	{

		return  $this->newQuery()->where('user_id',Auth::user()->id)->whereIn('actividad_id',$fileentryId)->get();
	
	}

}