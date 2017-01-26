<?php namespace App\Repository;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use File as Archivo;
use App\Apoyo;
use Auth;
use Input;
class ApoyoRepository extends BaseRepository {


	public function getModel()
	{
		return new Apoyo();
	}

	public function apoyo(Request $request, $id)
	{		
			$dir = public_path().'/material/';
			$file = $dir.$this->filename($request);
			if(!file_exists($file))
			{
				$this->movePath($request);
				return Apoyo::create([

				'mime' => $this->type($request),
				'original_filename' => 	$this->filename($request),
				'filename' => $this->filename($request),
				'actividad_id' => $id,
				'user_id' => Auth::user()->id

				]);	
			}else{

				return abort(404, 'El archivo ya existe');
			}
	}

	public function descargar($filename)
	{
		$archivo = public_path().'/material/'.$filename;
        return $archivo;
	}

	public function deleteApoyo($id)
	{
		$file = $this->descargar($this->search($id)->filename);
        Archivo::delete($file);
        $this->search($id)->delete();
	}

	protected function file(Request $request)
    {
        return $request->file('archivo');
    }

    protected function fileName(Request $request)
    {
        return $this->file($request)->getClientOriginalName();
    }

    protected function type(Request $request)
    {
        return $request->file('archivo')->getClientMimeType();
    }

    protected function path()
    {
        return public_path().'/material';
    }

	protected function movePath(Request $request)
    {
        return $this->file($request)->move($this->path(), $this->filename($request));
    }
}