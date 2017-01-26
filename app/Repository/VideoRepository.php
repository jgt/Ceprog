<?php namespace App\Repository;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use File as Archivo;

class VideoRepository extends BaseRepository {


	public function getModel()
	{

		return new Video();
	}

	public function subirVideo($id, Request $request)
	{
		return Video::create([

			'mime' => $this->mime($request),
			'original_filename' => 	$this->originalFilename($request),
			'filename' => $this->filename($request),
			'ruta' => $this->movePath($request),
			'unidad_id' => $id,

		]);
	}

	public function descargar($filename)
	{
     	$file = public_path().'/uploads/'.$filename;
		return $file;
	}

	public function borrar($id)
	{	
		$file = public_path().'/uploads/'.$this->search($id)->original_filename;
		Archivo::delete($file);
		$this->search($id)->delete();
	}

	protected function file(Request $request)
	{
		return $request->file('archivo');
	}

	protected function path()
	{
		return  public_path().'/uploads';
	}

	protected function mime(Request $request)
	{
		return $this->file($request)->getClientMimeType();	
	}

	protected function originalFilename(Request $request)
	{
		return $this->file($request)->getClientOriginalName();
	}

	protected function filename(Request $request)
	{
		return $this->file($request)->getfilename();
	}

	protected function movePath(Request $request)
	{
		return $this->file($request)->move($this->path(), $this->originalFilename($request));
	}

}