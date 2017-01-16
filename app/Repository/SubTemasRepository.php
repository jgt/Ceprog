<?php  namespace App\Repository;

use App\Subtemas;
use App\Imagenes;
use Illuminate\Http\Request;
use File as Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SubTemasRepository extends BaseRepository {

	public function getModel()
	{

		return new Subtemas();
	}
	
	public function subirImagen($id, Request $request)
	{
		return Imagenes::create([

				'mime' => $this->mime($request),
				'original_filename' => $this->filename($request),
				'filename' => $this->filename($request),
				'ruta' => $this->movePath($request),
				'subtema_id' => $id,

		]);	
	}

	public function deleteImg($id)
	{
		Archivo::delete($this->path().$this->imgFileName($id));
		$this->img($id)->delete();
	}

	protected function img($id)
	{
		return Imagenes::find($id);
	}

	protected function imgFileName($id)
	{
		return $this->img($id)->original_filename;
	}

	protected function file(Request $request)
	{
		return $request->file('archivo');
	}

	protected function filename(Request $request)
	{
		return $this->file($request)->getClientOriginalName();
	}

	protected function mime(Request $request)
	{
		return $this->file($request)->getClientMimeType();
	}

	protected function path()
	{
		return public_path().'/uploads/';
	}

	protected function movePath(Request $request)
	{
		return $this->file($request)->move($this->path(), $this->filename($request));
	}
}