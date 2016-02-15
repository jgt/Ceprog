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
use App\Repository\SemestreRepository;
use App\Repository\UserRepository;
use App\Repository\MateriaRepository;
use App\Repository\CalificacionRepository;
use App\Repository\RubricasRepository;
use App\Repository\ExamenRepository;
use App\Repository\UnidadRepository;

class ActividadController extends Controller {


	private $actividadRepository;
	private $semestreRepository;
	private $userRepository;
	private $materiaRepository;
	private $calificacionRepository;
	private $rubricaRepository;
	private $examenRepository;
	private $unidadRepository;

	public function __construct(

		ActividadRepository $actividadRepository, 
		SemestreRepository $semestreRepository,
		UserRepository $userRepository,
		MateriaRepository $materiaRepository,
		CalificacionRepository $calificacionRepository,
		RubricasRepository $rubricaRepository,
		ExamenRepository $examenRepository,
		UnidadRepository $unidadRepository)
	{

		$this->actividadRepository = $actividadRepository;
		$this->semestreRepository = $semestreRepository;
		$this->userRepository = $userRepository;
		$this->materiaRepository = $materiaRepository;
		$this->calificacionRepository = $calificacionRepository;
		$this->rubricaRepository = $rubricaRepository;
		$this->examenRepository = $examenRepository;
		$this->unidadRepository = $unidadRepository;
	}

	public function verCarreras(Request $request)
	{

		$semestres = $this->userRepository->verCarrera($request);

		return view('listalumnos', compact('semestres'));
	}


	public function verMaterias($id)
	{

		$materias = $this->semestreRepository->verMaterias($id);
        return view('vermaterias', compact('materias'));
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

		$actividades = Unidad::find($id)->actividades()->get();
		$actividadesId = $this->actividadRepository->getModel()->where('unidad_id',$id)->lists('id');
		$calificaciones = $this->calificacionRepository->notasActividades($actividadesId);
		$promedio = $this->calificacionRepository->promedioActividad($actividadesId);

		$detalles = [

			'actividades' => $actividades,
			'calificaciones' => $calificaciones,
			'promedio' => $promedio

		];

		if($request->ajax())
		{

			return response()->json($detalles);
		}
		
		return view('promedioGeneral', compact('calificaciones','promedio', 'actividadesId'));	
	}


	public function calCarrera($id)
	{

		$semestre = Semestre::find($id);
		$materias = $semestre->materias()->get();

		return view('calCarrera', compact('materias', 'semestre'));

	}

	public function verExamen($id, Request $request)
	{	

		$materia = $this->materiaRepository->search($id);
		$examenes = $this->materiaRepository->getExamen($id);

		if($request->ajax())
		{
			return response()->json($examenes);
		}

		return view('examen.listExamen', compact('examenes', 'materia'));
	}
}
