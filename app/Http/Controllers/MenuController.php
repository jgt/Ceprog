<?php

namespace App\Http\Controllers;

use Anouar\Fpdf\Facades\Fpdf;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\MateriaRepository;
use App\Repository\ActividadRepository;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Repository\CarreraRepository;
use App\Repository\SemestreRepository;
use App\Repository\ExamenRepository;
use App\Repository\UnidadRepository;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use App\Tutorial;
use Auth;
use App\Carrera;
use App;

class MenuController extends Controller
{
    

    private $materiaRepository;
    private $actividadRepository;
    private $userRepository;
    private $roleRepository;
    private $carreraRepository;
    private $semestreRepository;
    private $examenRepository;
    private $unidadRepository;

    public function __construct(

        MateriaRepository $materiaRepository,
        ActividadRepository $actividadRepository,
        UserRepository $userRepository,
        CarreraRepository $carreraRepository,
        SemestreRepository $semestreRepository,
        RoleRepository $roleRepository,
        ExamenRepository $examenRepository,
        UnidadRepository $unidadRepository)
    {

        $this->materiaRepository = $materiaRepository;
        $this->actividadRepository = $actividadRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->carreraRepository = $carreraRepository;
        $this->semestreRepository = $semestreRepository;
        $this->examenRepository = $examenRepository;
        $this->unidadRepository = $unidadRepository;

    }

    public function index(Request $request)
    {

        $materias = $this->userRepository->materiasProfesores($request);
        $mta = $this->materiaRepository->searchList();
        $semestres = $this->semestreRepository->searchList();
        $carreras = $this->carreraRepository->searchList();
        $roles = $this->roleRepository->searchList();
        $users = $this->userRepository->listaUser($request);
        $materiasForo = $this->materiaRepository->showMaterias();
        $alumnos = $this->userRepository->alumnosMenu($request);

        

        if($request->ajax())
        {
            return response()->json($alumnos);
        }

        return view('home', compact('materias', 'roles', 'users', 'materiasForo', 'carreras', 'mta', 'semestres', 'alumnos'));
    }


    public function listAlumnos($id, Request $request)
    {

        $semestre = $this->materiaRepository->search($id)->where('id', $id)->with('semestre.users.roles', 'semestre.carrera')->get();

        if($request->ajax())
        {
            return response()->json($semestre);
        }
    }

    public function listActUser($id, Request $request)
    {

        $user = $this->materiaRepository->search($id)->where('id', $id)->with('unidades.actividades.fileentries.user')->get();

        if($request->ajax())
        {
            return response()->json($user);
        }

    }


    public function reporteUser($id, $materia, Request $request)
    {

        $pdf = App::make('dompdf.wrapper');
        $users = $this->userRepository->search($id);
        $course = $this->materiaRepository->search($materia);
        $actividades = $this->materiaRepository->actMat($materia);
        $totalExamen = $this->materiaRepository->sumaExamenes($id, $materia);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('reportePdf', compact('users', 'actividades','totalExamen'));
        return $pdf->stream('Reporte.pdf');

        if($request->ajax())
        {
            return response()->json($actividades);
        }
    }
    
    public function reporteGeneral($id, Request $request)
    {

        $content = $this->examenRepository->reporteGeneral($id);

        Excel::create('Reporte General', function($excel) use ($content){

            $excel->sheet('Reporte', function($sheet) use ($content){

               $sheet->fromArray($content, null, 'A1', true,false);

            });

        })->export('xlsx');
    
    }

        public function calUnidad($id, Request $request)
        {   
                
            $datos = $this->actividadRepository->calAct($id);

             return response()->json($datos); 
        }
    
}
