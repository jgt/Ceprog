<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App;
use App\Actividad;
use Illuminate\Http\Request;
use App\Http\Requests\EditUnidad;
use App\Http\Requests\Unidad as plt;
use App\Repository\MateriaRepository;
use App\Repository\UnidadRepository;

class DisenoController extends Controller {


	private $materiaRepository;
	private $unidadRepository;

	public function __construct(

		MateriaRepository $materiaRepository, 
		UnidadRepository $unidadRepository)
	{

		$this->materiaRepository = $materiaRepository;
		$this->unidadRepository = $unidadRepository;
	}

	
	public function planeacion($id, Request $request)
	{	

		$materias = $this->materiaRepository->search($id);
		$users = Auth::user();
		$detalles = [

			'materia' => $materias,
			'users' => $users,
			'semestre' => $materias->semestre

		];

		if($request->ajax())
		{

			return response()->json($detalles);

		}


		return view('create.planeacion', compact('materias', 'users'));
	}

	public function storePlan(plt $request)
	{

		$unidad = $this->unidadRepository->crearUnidad($request);

		if($request->ajax()){

			return response()->json($unidad);
		}

	}

	public function listPlan($id, Request $request)
	{
		$materia = $this->materiaRepository->search($id);
		$unidades = $materia->unidades()->get();
		
		if($request->ajax())
		{

			return response()->json($unidades);
		}
		
	}


	public function editplan($id, Request $request)
	{
		$user = Auth::user();
		$unidad = $this->unidadRepository->search($id);
		
		if($request->ajax())
		{

			return response()->json($unidad);
		}


	}


	public function updateplan($id, Request $request)
	{
		
		$update = $this->unidadRepository->updateUnidad($request, $id);
		
		if($request->ajax())

		{
			return response()->json($update);
		}

	}


	public function planPdf($id, Request $request)

	{
		
		$pdf = App::make('dompdf.wrapper');
		$actividad = Actividad::find($id);
		$customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
		$pdf->loadview('showactividad', compact('actividad'));
		return $pdf->stream('Actividad.pdf');
	}

	public function show($id)
	{
		$planeacion = $this->unidadRepository->search($id);
		return view('pdf.vistaprevia', compact('planeacion'));

	}

	public function idUnidad($id, Request $request)

	{

		$materia = $this->materiaRepository->search($id);
		$unidades = $materia->unidades()->get();
	
		if($request->ajax())
		{
			return response()->json($unidades);
		}
	}


	public function idSubtemas($id, Request $request)
	{

		$unidad = $this->unidadRepository->search($id);
		$subtemas = $unidad->subtemas()->get();
		$videos = $unidad->videos()->get();

		$detalles = [

			'unidad' => $unidad,
			'subtemas' => $subtemas,
			'videos' => $videos

		];

		if($request->ajax())
		{

			return response()->json($detalles);
		}

	}

}
