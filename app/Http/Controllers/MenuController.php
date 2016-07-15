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
    /**************************************************
    * @Author: Anwar Sarmiento Ramos
    * @Email: asarmiento@sistemasamigables.com
    * @Create: 15/07/16 12:40 AM   @Update 0000-00-00
    ***************************************************
    * @Description: Creacion de reporte general de alumnos
    *
    *
    *
    * @Pasos:
    *
    *
    * @return PDF
    ***************************************************/
    public function reporteGeneral($id, Request $request)
    {



        $examen = $this->examenRepository->search($id);
        $cantidadPre = $examen->preguntas->count()/4;
        $contar =4;




        /**Encabezado de la tabla del datos*/



            $pdf  = Fpdf::AddPage('l','letter');
            $pdf .= Fpdf::SetFont('Arial','B',16);
            $pdf .= Fpdf::Cell(0,7,utf8_decode('Reporte General'),0,1,'C');
            $pdf .= Fpdf::SetFont('Arial','B',16);
            $pdf .= Fpdf::Cell(0,7,'',0,1,'C');
            $pdf .= Fpdf::Image(public_path().'/img/logo.jpg',10,8,80,20);
            $pdf .= Fpdf::Ln();
            $pdf .= Fpdf::Ln();
            $pdf .= Fpdf::Ln();

            $pdf .= Fpdf::SetFont('Arial','B',12);
            $pdf .= Fpdf::Cell(60,7,'Alumnos/No.Preguntas',0,0,'C');
            $pdf .= Fpdf::SetFont('Arial','B',9);
            /**Encabezado de la tabla del datos*/
         foreach($examen->preguntas as $contador => $pregunta):
                $cont = ($contador+1);
                if($cont <=4 ):
                    $pdf .= Fpdf::Cell(50,7,$cont.'. '.utf8_decode($pregunta->contenido),0,0,'L');
                endif;
            endforeach;
            $pdf .= Fpdf::Ln();

            foreach($examen->materia->semestre->users as $user):
                $pdf .= Fpdf::SetFont('Arial','B',12);
                $pdf .= Fpdf::Cell(50,7,$user->name,0,0,'C');
                $i=0;
                foreach($examen->preguntas as  $pregunta):
                    $i++;
                    if($i<=4):
                        foreach($user->respuestasUser as $preguntaUser):
                            if($pregunta->id == $preguntaUser->pregunta_id):

                                foreach($pregunta->respuestas as $respuesta):
                                    if($respuesta->id == $preguntaUser->respuesta_id):

                                        if($respuesta->estado==1):
                                            $pdf .= Fpdf::Cell(50,7,'Correcto',0,0,'C');
                                        else:
                                            $pdf .= Fpdf::Cell(50,7,'incorrecta',0,0,'C');
                                        endif;
                                    endif;
                                endforeach;
                            endif;
                        endforeach;
                    endif;
                endforeach;
                $pdf .= Fpdf::Ln();
            endforeach;
        /**Bloque 2*/
        if($cont >= 5 && $cont <= 9):
            $pdf  = Fpdf::AddPage('l','letter');
            $pdf .= Fpdf::SetFont('Arial','B',16);
            $pdf .= Fpdf::Cell(0,7,utf8_decode('Reporte General'),0,1,'C');
            $pdf .= Fpdf::SetFont('Arial','B',16);
            $pdf .= Fpdf::Cell(0,7,'',0,1,'C');
            $pdf .= Fpdf::Image(public_path().'/img/logo.jpg',10,8,80,20);
            $pdf .= Fpdf::Ln();
            $pdf .= Fpdf::Ln();
            $pdf .= Fpdf::Ln();

            $pdf .= Fpdf::SetFont('Arial','B',12);
            $pdf .= Fpdf::Cell(60,7,'Alumnos/No.Preguntas',0,0,'C');
            $pdf .= Fpdf::SetFont('Arial','B',9);
            /**Encabezado de la tabla del datos*/
            foreach($examen->preguntas as $contador => $pregunta):
                $cont = ($contador+1);
                if($cont >=5 ):
                    $pdf .= Fpdf::Cell(50,7,$cont.'. '.utf8_decode($pregunta->contenido),0,0,'L');
                endif;
            endforeach;
            $pdf .= Fpdf::Ln();

            foreach($examen->materia->semestre->users as $user):
                $pdf .= Fpdf::SetFont('Arial','B',12);
                $pdf .= Fpdf::Cell(50,7,$user->name,0,0,'C');
                $i=0;
                foreach($examen->preguntas as  $pregunta):
                    $i++;
                    if($i>=9 && $i<=12):
                        foreach($user->respuestasUser as $preguntaUser):
                            if($pregunta->id == $preguntaUser->pregunta_id):

                                foreach($pregunta->respuestas as $respuesta):
                                    if($respuesta->id == $preguntaUser->respuesta_id):

                                        if($respuesta->estado==1):
                                            $pdf .= Fpdf::Cell(50,7,'Correcto',0,0,'C');
                                        else:
                                            $pdf .= Fpdf::Cell(50,7,'incorrecta',0,0,'C');
                                        endif;
                                    endif;
                                endforeach;
                            endif;
                        endforeach;
                    endif;
                endforeach;
                $pdf .= Fpdf::Ln();
            endforeach;
        endif;
        /**Bloque 3*/
        if($cont >= 15 && $cont <= 19):
            $pdf  = Fpdf::AddPage('l','letter');
            $pdf .= Fpdf::SetFont('Arial','B',16);
            $pdf .= Fpdf::Cell(0,7,utf8_decode('Reporte General'),0,1,'C');
            $pdf .= Fpdf::SetFont('Arial','B',16);
            $pdf .= Fpdf::Cell(0,7,'',0,1,'C');
            $pdf .= Fpdf::Image(public_path().'/img/logo.jpg',10,8,80,20);
            $pdf .= Fpdf::Ln();
            $pdf .= Fpdf::Ln();
            $pdf .= Fpdf::Ln();

            $pdf .= Fpdf::SetFont('Arial','B',12);
            $pdf .= Fpdf::Cell(60,7,'Alumnos/No.Preguntas',0,0,'C');
            $pdf .= Fpdf::SetFont('Arial','B',9);
            /**Encabezado de la tabla del datos*/
            foreach($examen->preguntas as $contador => $pregunta):
                $cont = ($contador+1);
                if($cont >=5 ):
                    $pdf .= Fpdf::Cell(50,7,$cont.'. '.utf8_decode($pregunta->contenido),0,0,'L');
                endif;
            endforeach;
            $pdf .= Fpdf::Ln();

            foreach($examen->materia->semestre->users as $user):
                $pdf .= Fpdf::SetFont('Arial','B',12);
                $pdf .= Fpdf::Cell(50,7,$user->name,0,0,'C');
                $i=0;
                foreach($examen->preguntas as  $pregunta):
                    $i++;
                    if($i>=9 && $i<=12):
                        foreach($user->respuestasUser as $preguntaUser):
                            if($pregunta->id == $preguntaUser->pregunta_id):

                                foreach($pregunta->respuestas as $respuesta):
                                    if($respuesta->id == $preguntaUser->respuesta_id):

                                        if($respuesta->estado==1):
                                            $pdf .= Fpdf::Cell(50,7,'Correcto',0,0,'C');
                                        else:
                                            $pdf .= Fpdf::Cell(50,7,'incorrecta',0,0,'C');
                                        endif;
                                    endif;
                                endforeach;
                            endif;
                        endforeach;
                    endif;
                endforeach;
                $pdf .= Fpdf::Ln();
            endforeach;
        endif;



        /**Fin*/
        Fpdf::Output();
        exit;
    }


}
