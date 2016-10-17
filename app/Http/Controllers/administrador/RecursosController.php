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

class RecursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recursos::all();
        return response()->json($recursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
