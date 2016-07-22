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
use Maatwebsite\Excel\Facades\Excel;
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

    public function __construct(

        MateriaRepository $materiaRepository,
        ActividadRepository $actividadRepository,
        UserRepository $userRepository,
        CarreraRepository $carreraRepository,
        SemestreRepository $semestreRepository,
        RoleRepository $roleRepository,
        ExamenRepository $examenRepository)
    {

        $this->materiaRepository = $materiaRepository;
        $this->actividadRepository = $actividadRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->carreraRepository = $carreraRepository;
        $this->semestreRepository = $semestreRepository;
        $this->examenRepository = $examenRepository;

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

    public function reporteCarrera(Request $request)
    {

        $carreras = Carrera::all();

        if($request->ajax())
        {
            return response()->json($carreras);
        }
    }


    public function pdfCarrera($id, Request $request)

    {
        
        $pdf = App::make('dompdf.wrapper');
        $carreras = $this->carreraRepository->search($id)->semestres()->get();
        $alumnos = $this->carreraRepository->search($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('reporte', compact('carreras', 'alumnos'));
        return $pdf->stream('Reporte.pdf');
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

        
        $examen = $this->examenRepository->search($id);
        $preguntas = $examen->preguntas()->get();

        foreach ($preguntas as $pregunta) {
                
                $preg[] = $pregunta->contenido;
     }


     $content = [

                    ['Universidad Ceprog'],
                    [''],
                    [''],
                    array_merge(['Alumnos/No.Preguntas'],$preg),


            ];

        foreach ($examen->materia->semestre->users as $user) { 

                $content[] = [$user->name];
            foreach($preguntas as $pregunta){
                foreach ($user->respuestasUser as $preguntaUser) {
                    if ($pregunta->id == $preguntaUser->pregunta_id) {
                        
                        foreach ($pregunta->respuestas as $respuesta) {

                            $resp[] = $respuesta->estado;
                            if ($respuesta->id == $preguntaUser->respuesta_id) {
                                if ($respuesta->estado==1) {

                                    $content[] = array_merge([''], $resp);
                                    
                                }
                            }
                        }
                    }
                }

            }
            
        }
        
        Excel::create('Reporte General', function($excel) use ($content){

            $excel->sheet('Reporte', function($sheet) use ($content){

               $sheet->fromArray($content, null, 'A1', true,false);

            });

        })->export('xlsx');
    
    }

}
