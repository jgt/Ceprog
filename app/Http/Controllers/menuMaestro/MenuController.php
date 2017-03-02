<?php

namespace App\Http\Controllers\menuMaestro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\MateriaRepository;
use App\Repository\UnidadRepository;
use App\Repository\VideoRepository;
use App\Repository\ActividadRepository;
use App\Repository\ApoyoRepository;
use Auth;
use App;
use App\User;
use App\Calificacion;
use App\Examen;

class MenuController extends Controller
{

	private $videoRepository;
    private $materiaRepository;
    private $unidadRepository;
    private $actividadRepository;
    private $apoyoRepository;

    public function __construct(

        MateriaRepository $materiaRepository, 
        UnidadRepository $unidadRepository,
        VideoRepository $videoRepository,
        ActividadRepository $actividadRepository,
        ApoyoRepository $apoyoRepository)
    {

    	$this->apoyoRepository = $apoyoRepository;
    	$this->actividadRepository = $actividadRepository;
        $this->materiaRepository = $materiaRepository;
        $this->unidadRepository = $unidadRepository;
        $this->videoRepository = $videoRepository;
    }
    
    public function uploads($id, Request $request)
    {
    	return $this->videoRepository->subirVideo($id, $request);
    }

    public function pdfPaquete($id)
    {
    	$pdf = App::make('dompdf.wrapper');
        $unidad = $this->unidadRepository->search($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('showalumno', compact('unidad'));
        return $pdf->stream();		
    }

    public function verPaquete($id)
    {
    	$unidad = $this->unidadRepository
            ->getModel()
    		->with('materia.semestre', 'subtemas.imagenes', 'videos')
            ->find($id);

		return response()->json($unidad);
    }

    public function pdfActividad($id)
    {
    	return $this->actividadRepository->convertir($id);
    }

    public function uploadsApoyo($id, Request $request)
    {
    	$apoyo = $this->apoyoRepository->apoyo($request, $id);
		return response()->json($apoyo);
    }

    public function verActividad($id)
    {
    	$actividad = $this->actividadRepository->search($id)
    		->where('id', $id)
    		->with('rubricas', 'apoyos')
    		->get();
    	return response()->json($actividad);
    }

    public function calificar($id)
    {
        $semestre = $this->actividadRepository->search($id)
            ->where('id', $id)
            ->with('unidad.materia.semestre.users.roles', 'unidad.materia.semestre.users.calificaciones')
            ->get();
        return response()->json($semestre);

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
        return response()->json($actividades);
    }

    public function consultar($id, $act)
    {
        $user = User::with(['calificaciones' => function($query) use ($act){
            $query->where('actividad_id', $act)
                ->with('rubricas.actividad');

        }])->find($id);

        $archivos = User::with(['fileentry' => function($query) use ($act){
            $query->where('actividad_id', $act);

        }])->find($id);

        $detalles =['user' => $user, 'archivos' => $archivos];

        return response()->json($detalles);

    }

    public function editComentario($id, Request $request)
    {
        $calificacion = Calificacion::find($id);
        $calificacion->update($request->all());
        return response()->json($calificacion);
    }

    public function listExamen($id)
    {
        $materia = $this->materiaRepository->search($id)
            ->where('id', $id)
            ->with('examenes.preguntas.respuestas')
            ->get();

        return response()->json($materia);
    }

    public function hojaRespuestas($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $examen = Examen::find($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('showPdfExamen', compact('examen'));
        return $pdf->stream();
    }

    public function imprimirExam($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $examen = Examen::find($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('imprimirExam', compact('examen'));
        return $pdf->stream();
    }

    public function exmMaestro($materia)
    {
        $respuestas = $this->materiaRepository->search($materia)
            ->where('id', $materia)
            ->with('examenes.resultados')->get();

        return response()->json($respuestas);
    }

    public function notaExamenes($id, $examen)
    {
        $pdf = App::make('dompdf.wrapper');
        $examen = Examen::find($examen);
        $user = User::find($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('showNtoExamen', compact('examen', 'user'));
        return $pdf->stream();
    }
}
