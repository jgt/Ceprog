<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditCarrera;
use App\Http\Controllers\Controller;
use App\Carrera;

use Illuminate\Http\Request;
use App\Repository\CarreraRepository;

class CarreraController extends Controller {

	
	private $carreraRepository;

	public function __construct(CarreraRepository $carreraRepository)
	{

		$this->carreraRepository = $carreraRepository;

	}

	public function index(Request $request)
	{

		$carreras = $this->carreraRepository->listaCarreras($request);
		return view('carreras.listaCarreras', compact('carreras'));
	}

	
	public function create(Request $request)
	{
		
		return view('carreras.planestudio');
	}

	
	public function store(EditCarrera $request)
	{
		
		 $this->carreraRepository->crearCarrera($request);
         return redirect()->route('carrera.index');
	}

	
	public function show($id)
	{
		
		
	}

	
	public function edit($id)
	{

		$carrera = $this->carreraRepository->search($id);
		$semestres = $this->carreraRepository->listSemestres($id);
    	return view('carreras.updateCarrera', compact('semestres', 'carrera'));
	}

	
	public function update(EditCarrera $request, $id)
	{

		 $this->carreraRepository->updateCarrera($request, $id);
         return redirect()->route('carrera.index');
	}



	public function destroy($id)
	{
		
		$this->carreraRepository->deleteCarrera($id);
		return redirect()->route('carrera.index');
	}

}


