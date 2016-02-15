<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearSemestre;
use App\Http\Requests\EditarSemestre;
use App\Http\Controllers\Controller;

use App\Carrera;
use App\Semestre;

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
		
      $this->semestreRepository->crearSemestre($request);
      return redirect()->route('carrera.index');

	}

	
	public function show($id)
	{
		
		
	}

	
	public function edit($id)
	{
		
		$semestre = $this->semestreRepository->search($id);

  	    $materias = $this->semestreRepository->listMaterias($id);

  	    return view('semestre.editarSemestre', compact('semestre', 'materias'));
	}

	
	public function update($id, EditarSemestre $request)
	{
		
			$semestre = $this->semestreRepository->updateSemestre($request, $id);
  	        return redirect()->route('materia.index');
	}

	
	public function destroy($id)
	{
		
	}

	public function crearSemestre($id)
	{

		$carrera = $this->carreraRepository->search($id);	
        return view('semestre.crearSemestre', compact('carrera'));

	}

}
