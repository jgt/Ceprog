<?php

namespace App\Http\Controllers\menuAlumnos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repository\UnidadRepository;
use App\Repository\ActividadRepository;
use App\Repository\UserRepository;
use App\Repository\MateriaRepository;
use App\Repository\CalificacionRepository;
use App\Repository\RubricasRepository;
use App\Repository\ExamenRepository;
use App\Unidad;
use App\Actividad;
use Auth;
use App;

class AlumnoMenuController extends Controller
{   

    private $actividadRepository;
    private $userRepository;
    private $materiaRepository;
    private $calificacionRepository;
    private $rubricaRepository;
    private $examenRepository;
    private $unidadRepository;

    public function __construct(

        ActividadRepository $actividadRepository, 
        UserRepository $userRepository,
        MateriaRepository $materiaRepository,
        CalificacionRepository $calificacionRepository,
        RubricasRepository $rubricaRepository,
        ExamenRepository $examenRepository,
        UnidadRepository $unidadRepository)
    {

        $this->actividadRepository = $actividadRepository;
        $this->userRepository = $userRepository;
        $this->materiaRepository = $materiaRepository;
        $this->calificacionRepository = $calificacionRepository;
        $this->rubricaRepository = $rubricaRepository;
        $this->examenRepository = $examenRepository;
        $this->unidadRepository = $unidadRepository;
    }


    public function promedio($id, Request $request)
    {

        $idUser = Auth::user()->id;
        $materia = Unidad::find($id)->materia_id;
        $user = Auth::user();
        $actividades = Unidad::find($id)->actividades()->get();
        $actividadesId = $this->actividadRepository->getModel()->where('unidad_id',$id)->lists('id');
        $promedio = $this->calificacionRepository->promedioActividad($actividadesId);
        $totalExamen = $this->materiaRepository->sumaExamenes($idUser, $materia);
        $pdf = App::make('dompdf.wrapper');
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
       $pdf->loadview('calificacionAlm', compact('actividades', 'promedio', 'user', 'totalExamen'));
        return $pdf->stream('Calificacion.pdf');    
    }

    public function activacionAct($id)
    {
        $actividad = $this->actividadRepository->search($id)
            ->where('id', $id)
            ->with('rubricas', 'apoyos')
            ->get();
            
        return response()->json($actividad);
    }

    public function verNota($id)
    {   
        $actividad = $this->actividadRepository->getModel()
            ->with(['calificaciones' => function($query){
                $query->where('user_id', Auth::user()->id)
                    ->with('rubricas');

            }])->find($id);

        return response()->json($actividad);
    }
   
}
