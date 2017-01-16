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
        $file = $this->descargar($filename);
        return $file;
    }

    public function borrarPlc($id)
    {
        $file = $this->descargar($this->search($id)->filename);

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
            $this->movePath($request);
            return Planeacion::create([

            'mime' => $this->type($request),
            'original_filename' => $this->fileName($request),
            'filename' => $this->fileName($request),
            'materia_id' => $id,
            'user_id' => $this->authUser()

            ]);
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
        return $this->file($request)->getClientOriginalName();
    }

    protected function path()
    {
        return public_path().'/planeacion';
    }

    protected function movePath(Request $request)
    {
        return $this->file($request)->move($this->path(), $this->filename($request));
    }

    protected function type(Request $request)
    {
        return $request->file('archivo')->getClientMimeType();
    }

    protected function descargar($filename)
    {   
        $public_path = public_path();
        $archivo = $public_path.'/planeacion/'.$filename;
        return $archivo;
    }

}