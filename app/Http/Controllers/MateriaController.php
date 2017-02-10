<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMateria;
use App\Http\Controllers\Controller;

use App\Materia;
use App\Semestre;
use App\Carrera;
use App\User;

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
        return response()->json($materias);
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

	
	public function show($id, Request $request)
	{
		$materias = $this->semestreRepository->getMaterias($id);

		if($request->ajax())
		{
			return response()->json($materias);
		}
	}

	
	public function edit($id, Request $request)
	{
		

		 $materia = $this->materiaRepository->search($id);

		 if($request->ajax())
		 {
		 	return response()->json($materia);
		 }
      
	}

	
	public function update($id, Request $request)
	{
		
		$materia = $this->materiaRepository->updateMateria($request, $id);

		if($request->ajax())
		{
			return response()->json($materia);
		}
         
	}

   public function matDelete($id, $semestre)
   {
   		$delete = $this->materiaRepository->deleteMateria($id);
   		$semestre = $this->semestreRepository->search($semestre);
   		$materias = $semestre->materias()->get();

   		return response()->json($materias);
   }

   public function attachMaterias($id, Request $request)
   {
   		$user = User::find($id);
   		$user->materias()->attach($request->get('matProg'));
   		return response()->json($user);
   }
}




 



