<?php


namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use File as Archivo;
use Auth;
use App\Recursos;
use Datatables;

class RecursosControllers extends Controller
{

	 public function index()
    {
        $recursos = Recursos::all();
        return Datatables::of($recursos)->make(true);
    }

    public function store(Request $request)
    {   

        $file = $request->file('archivo');
        $dir = public_path().'/recurso';
        $original_filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();
        $ruta = $file->move($dir, $original_filename);

    
             $recurso = Recursos::create([

            'name' => $request->get('name'),
            'descripcion' => $request->get('descripcion'),
            'filename' => $file->getfilename(),
            'original_filename' => $original_filename,
            'mime' => $mime,
            'ruta' => $ruta

            ]);

             $recurso->save();
             return response()->json($recurso);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recurso = Recursos::find($id);
        return response()->json($recurso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recurso = Recursos::find($id);
        return response()->json($recurso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recurso = Recursos::find($id);
        $recurso->update($request->all());
        return response()->json($recurso);
    }

 
    public function downloadRecursos($filename)
    {   

        $public_path = public_path();
        $file =  $public_path.'/recurso/'.$filename;
        return response()->download($file);

    }

    public function deleteRecurso($id, Request $request)
    {

        $recurso = Recursos::find($id);
        $public_path = public_path();

        $file = $public_path.'/recurso/'.$recurso->original_filename;
        
        if($file){


            Archivo::delete($file);
            $recurso->delete();

        }

        return response()->json($recurso);

    }
}