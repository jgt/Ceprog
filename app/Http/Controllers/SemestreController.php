<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearSemestre;
use App\Http\Requests\EditarSemestre;
use App\Http\Controllers\Controller;

use App\Carrera;
use App\Semestre;
use App\Campus;

use Illuminate\Http\Request;
use App\Repository\SemestreRepository;
use App\Repository\CarreraRepository;

class SemestreController extends Controller {


	private $semestreRepository;
	private $carreraRepository;

	public function __construct(SemestreRepository $semestreRepository, CarreraRepository $carreraRepository)
	{

		$this->semestreRepository = $semestreRepository;
		$this->carreraRepository = $carreraRepository;
	}
	
	public function index()
	{	
		
		
	}

	
	public function create()
	{
		
		
	}

	
	public function store(CrearSemestre $request)
	{	
	     $semestre = $this->semestreRepository->crearSemestre($request);
	     return response()->json($semestre);
	}

	
	public function show($id, Request $request)
	{

		$semestres = $this->carreraRepository->getSemestres($id);
		
		if($request->ajax())
		{
			return response()->json($semestres);
		}
		
	}

	
	public function edit($id, Request $request)
	{
		
		$semestre = $this->semestreRepository->search($id)->where('id', $id)->with('campuses')->get();
		$campus = Campus::get();
		$detalles = ['semestre' => $semestre, 'campus' => $campus];
		return response()->json($detalles);  	    
	}

	
	public function update($id, EditarSemestre $request)
	{
		$semestre = $this->semestreRepository->updateSemestre($request, $id);
		$semestre->campuses()->sync($request->get('cmp_list'));
  	    return response()->json($semestre);
	}
	
	public function destroy($id)
	{
		
	}

	
	public function borrarSemestre($id)
	{

		$semestre = $this->semestreRepository->search($id);
		$semestre->delete();
	}

	public function alumnosSem($id, Request $request)
	{
		$semestre = $this->semestreRepository->search($id);
		$alumnos = $semestre->users()->get();
		return response()->json($alumnos);
	}

	public function smetrList($id)
	{
		$campus = Campus::find($id);
		$semestres = $campus->semestres()->get();
		return response()->json($semestres);
	}
}
