<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMateria;
use App\Http\Controllers\Controller;

use App\Materia;
use App\Semestre;
use App\Carrera;

use Illuminate\Http\Request;
use App\Repository\MateriaRepository;
use App\Repository\SemestreRepository;
use App\Repository\CarreraRepository;

class MateriaController extends Controller {


	private $materiaRepository;
	private $semestreRepository;
	private $carreraRepository;

	public function __construct(

		MateriaRepository $materiaRepository, 
		SemestreRepository $semestreRepository,
		carreraRepository $carreraRepository)
	{

		$this->materiaRepository = $materiaRepository;
		$this->semestreRepository = $semestreRepository;
		$this->carreraRepository = $carreraRepository;
	}
	
	public function index(Request $request)
	{
		
		$materias = $this->materiaRepository->listaMaterias($request);
        return view('materias.listaMaterias', compact('materias'));
	}


	public function create()
	{
		//
	}

	
	public function store(CreateMateria $request)
	{
		
	  $this->materiaRepository->crearMateria($request);		
      return redirect()->back();
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		

		 $materia = $this->materiaRepository->search($id);
	   	 $semestres = $this->semestreRepository->searchList();
      
        return view('materias.editMateria', compact('materia', 'semestres'));
	}

	
	public function update($id, Request $request)
	{
		
		$this->materiaRepository->updateMateria($request, $id);
         return redirect()->route('materia.index');
	}


	public function destroy($id)
	{
		
		$this->materiaRepository->deleteMateria($id);
		return redirect()->route('materia.index');
	}


	public function createMateria($id)
   {
      
   	  $this->carreraRepository->search($id);	
      $semestres = $this->carreraRepository->listSemestres($id);

      return view('materias.crearMateria', compact('semestres'));
   }

}


 



