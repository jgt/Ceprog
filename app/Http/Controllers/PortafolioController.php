<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Actividad;
use App\Calificacion;
use App\Fileentry;
use App\Rubrica;
use App\Materia;
use App;
use Auth;

use App\Repository\CalificacionRepository;
use App\Repository\ActividadRepository;
use App\Repository\UnidadRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;


class PortafolioController extends Controller {

	private $actividadRepository;
	private $calificacionRepository;
	private $unidadRepository;
	private $userRepository;

	public function __construct(

		ActividadRepository $actividadRepository, 
		CalificacionRepository $calificacionRepository,
		UnidadRepository $unidadRepository,
		UserRepository $userRepository)
	{

		$this->actividadRepository = $actividadRepository;
		$this->calificacionRepository = $calificacionRepository;
		$this->unidadRepository = $unidadRepository;
		$this->userRepository = $userRepository;

	}
	

	public function portafolio($id, Request $request)
	{

		$unidad = $this->unidadRepository->search($id);

		$actividades = $unidad->actividades()->orderBy('actividad', 'desc')->paginate(20);

		if($request->ajax())
		{
			return response()->json($actividades);
		}

		return view('include.actmaterias', compact('actividades', 'materia'));
	}

	public function verArchivos($id, Request $request)
	{


		$actividad = Actividad::find($id);

		$archivos = $actividad->fileentries()->get();

		$nota = [];

		foreach ($archivos as $archivo) {
				
				$user = $archivo->user;
				$nota = $archivo->user->calificaciones()->where('user_id', $user->id)->where('actividad_id', $actividad->id)->count();
			
		}
	
		$detalles = [

			'archivos' => $archivos,
			'nota' => $nota

		];

		if($request->ajax())
		{

			return response()->json($detalles);
		}

	}


	public function notaRubrica($id)
	{

		$actividad = Actividad::find($id);

		return view('vernotaRubrica', compact('actividad'));

	}


	public function calificacion($id, $user, Request $request)
	{	
		$user = $this->userRepository->search($user);
		$actividad = $this->actividadRepository->search($id);

		$detalles = [

			'user' => $user,
			'actividad' => $actividad,
			'rubricas' => $actividad->rubricas()->get()

		];

		return response()->json($detalles);
		
	}


	public function nota($id, Request $request)
	{

		$actividad = Actividad::find($id);

		 $rules = [

    		'promedio' => 'required|integer|min:0|max:80',
    		'user_id' => 'required',
    		'actividad_id' => 'required',

			];

		foreach ($actividad->rubricas as $rubrica) {	

			$rules['rubrica_'.$rubrica->id] = 'required|integer|min:0|max:'.$rubrica->total;
		}

		$this->validate($request, $rules);

		$nota = Calificacion::create($request->all());
		$calificacion = Calificacion::all()->last();
		foreach( $request->all() as $key => $value) {
			$name = explode('_', $key);
			
			if ($name[0]=='rubrica') 	
			{
				$calificacion->rubricas()->attach($name[1],['nota'=>$value]);
			}
		}
		
		flash()->overlay('Ha sido guardado correctamente', 'La calificacion');

		return redirect()->route('verArchivos', [$actividad]);
		
	}


	public function notaAlumno($id)
	{

		$materia = Materia::find($id);

		return view('notafinal', compact('materia'));

	}

	
	public function totalCal($id)
	{

		$materia = Materia::find($id);
		$actividadesId = $this->actividadRepository->getModel()->where('materia_id', $id)->lists('id');
		$calificacion = $this->calificacionRepository->notaGlobalActividades($actividadesId);
		$promedios = $this->calificacionRepository->promedioGlobalActividades($actividadesId);
		
		

		return view('pdf.calificacion', compact('materia', 'promedios'));
	}


}
