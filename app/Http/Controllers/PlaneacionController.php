<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Planeacion;
use App\Materia;
use Auth;
use Datatables;
use App\Repository\PlaneacionRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class PlaneacionController extends Controller
{
    private $planeacionRepository;
        
    public function __construct(PlaneacionRepository $planeacionRepository)
    {
        $this->planeacionRepository = $planeacionRepository;
    }


    public function index()
    {
        $planeacion = Materia::has('planeacion')->with('planeacion.user')->select('materias.*');
        return Datatables::of($planeacion)->make(true);
    }

    public function listPlaneacion($id)
    {   
        $materia = Materia::find($id);
        $planeacion = $materia->planeacion()->select('planeacions.*');
        return Datatables::of($planeacion)->make(true);
    }

    public function show($id)
    {
        $materia = Materia::find($id);
        return Response()->json($materia);
    }

    public function plcStore($id, Request $request)
    {
       $planeacion =  $this->planeacionRepository->store($id, $request);
       return Response()->json($planeacion);
    }

    public function plcDescargar($filename)
    {
        $file = $this->planeacionRepository->descargarPlaneacion($filename);
        return response()->download($file);
    }

    public function borrarPlc($id, Request $request)
    {
        $file = $this->planeacionRepository->borrarPlc($id, $request);
        return response()->json($file);
    }

}
