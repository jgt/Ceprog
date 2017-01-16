<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Actividad;
use App\Materia;
use App\Carrera;
use App\Semestre;
use App\Unidad;
use Auth;
use App;

use Illuminate\Http\Request;
use App\Repository\ActividadRepository;
use App\Repository\UserRepository;
use App\Repository\MateriaRepository;
use App\Repository\CalificacionRepository;
use App\Repository\RubricasRepository;
use App\Repository\ExamenRepository;
use App\Repository\UnidadRepository;

class ActividadController extends Controller {


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

	
	public function verUnidades($id, Request $request)
	{

		 $materia = $this->materiaRepository->search($id);
		 $unidades = $this->materiaRepository->getUnidades($id);
    	 
    	 if($request->ajax())
    	 {

    	 	return response()->json($unidades);
    	 }
	}


	public function verActividades($id, Request $request)
	{

		$unidad = $this->unidadRepository->search($id);
		$actividades = $this->unidadRepository->getActividades($id);

		if($request->ajax())
		{
			return response()->json($actividades);
		}


	}

	
	public function verPdf($id)
	{
		
		 $pdf = App::make('dompdf.wrapper');
         $unidad = Unidad::find($id);
         $customPaper = array(0,0,950,950);
         $paper_orientation = 'landscape';
         $pdf->setPaper($customPaper,$paper_orientation);
         $pdf->loadview('showalumno', compact('unidad'));
         return $pdf->stream();

		
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

	public function verExamen($id, Request $request)
	{	

		$materia = $this->materiaRepository->search($id);
		$examenes = $this->materiaRepository->getExamen($id);

		if($request->ajax())
		{
			return response()->json($examenes);
		}

	}
}
