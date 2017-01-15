<?php

namespace App\Repository;

use Auth;
use App\Planeacion;
use File as Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class PlaneacionRepository extends BaseRepository
{

	public function getModel()
	{
		return new Planeacion();
	}


	public function store($id, Request $request)
	{
		$planeacion =  $this->subirPlaneacion($id, $request);
		return $planeacion;
	}

     public function descargarPlaneacion($filename)
    {
        $file = $this->path($filename);
        return $file;
    }

    public function borrarPlc($id)
    {
        $file = $this->path($this->search($id)->filename);

        if($file){

            Archivo::delete($file);
            $this->search($id)->delete();
        }

        return $file;
    }

	protected function subirPlaneacion($id, Request $request)
    {
        if(!$this->getModel()->hasArchivo($id, $this->authUser()))
        {
            $move = $this->movePath($request);
            $planeacion = Planeacion::create([

            'mime' => $this->type($request),
            'original_filename' => $this->fileName($request),
            'filename' => $this->fileName($request),
            'materia_id' => $id,
            'user_id' => $this->authUser()

            ]);

            $planeacion->save();
            return $planeacion;
        }

        return abort(404, 'El archivo ya existe');
    }

    protected function authUser()
    {
        return Auth::user()->id;
    }

    protected function file(Request $request)
    {
        return $request->file('archivo');
    }

    protected function fileName(Request $request)
    {
        $file = $this->file($request);
        $filename = $file->getClientOriginalName();
        return $filename;
    }

    protected function movePath(Request $request)
    {
        $dir = public_path().'/planeacion';
        $file = $this->file($request);
        $ruta = $file->move($dir, $this->fileName($request));
        return $ruta;
    }

    protected function type(Request $request)
    {
        $type = $request->file('archivo');
        $type->getClientMimeType();
        return $type;
    }

    protected function path($filename)
    {   
        $public_path = public_path();
        $archivo = $public_path.'/planeacion/'.$filename;
        return $archivo;

    }

}