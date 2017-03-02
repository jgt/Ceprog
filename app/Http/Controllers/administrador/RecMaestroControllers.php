<?php


namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Auth;
use App\Recursos;
use Datatables;


class RecMaestroControllers extends Controller
{

	 public function index()
    {
        $recursos = Recursos::all();
        return Datatables::of($recursos)->make(true);
    }

  
    public function show($id)
    {
         $recurso = Recursos::find($id);
        return response()->json($recurso);
    }

   

    public function downloadRecursos($filename)
    {   

        $public_path = public_path();
        $file =  $public_path.'/recurso/'.$filename;
        return response()->download($file);

    }
}