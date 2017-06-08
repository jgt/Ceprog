<?php

namespace App\Http\Controllers\ExamenDiagnostico;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Administrador\EvaluacionDiagnostico\Area;
use App\Administrador\EvaluacionDiagnostico\ResultadoDiag;
use Datatables;
use App;
use App\Repository\UserRepository;
use Carbon\Carbon;

class ReporteExamenController extends Controller
{
    
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;     
    }

    public function index()
    {
        $users = User::has('resultadoDiag')->with('carreras', 'resultadoDiag')->select('users.*');
        return Datatables::of($users)
         ->addColumn('carr', function (User $user) {
                    return $user->carreras->map(function($carrera) {
                        return str_limit($carrera->name, 30, '...');
                    })->implode('<br>');
                })
         ->make(true);
    }

    public function pdfDiag($id, Request $request)
    {
        $pdf = App::make('dompdf.wrapper');
        $fecha = Carbon::now();
        $areas = Area::all(); 
        $user = User::find($id);
        $preguntasTotales = $this->userRepository->preguntasDiagnostico($id);
        $puntos = $this->userRepository->puntosExamen($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape'; 
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('reporteDiagnostico', compact('user', 'fecha', 'areas', 'preguntasTotales', 'puntos'));
        return $pdf->stream();
    }

    public function borrarReporte($id, $user)
    {
        $resultado = ResultadoDiag::find($id);
        $user = User::find($user);
        $resultado->delete();
        $user->respuestasDiagnostico()->delete(); 
    }
}
