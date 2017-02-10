<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditCarrera;
use App\Http\Controllers\Controller;
use App\Carrera;
use App\User;

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
		return response()->json($carreras);
	}

	
	public function create(Request $request)
	{
		
		return view('carreras.planestudio');
	}

	
	public function store(EditCarrera $request)
	{
		
		 $carrera = $this->carreraRepository->crearCarrera($request);
         
         if($request->ajax())
         {
         	return response()->json($carrera);
         }
	}

	
	public function show($id)
	{
		
		
	}

	
	public function edit($id, Request $request)
	{

		$carrera = $this->carreraRepository->search($id);
    	
    	if($request->ajax())
    	{
    		return response()->json($carrera);
    	}
	}

	
	public function update(EditCarrera $request, $id)
	{

		$carrera = $this->carreraRepository->updateCarrera($request, $id);
        
        if($request->ajax())
        {
        	return response()->json($carrera);
        }
	}



	public function destroy($id, Request $request)
	{
		
		$borrar = $this->carreraRepository->deleteCarrera($id);
		
		if($request->ajax())
		{
			return response()->json($borrar);
		}
	}

	public function deleteCarrera($id, Request $request)
	{
		
		$borrar = $this->carreraRepository->deleteCarrera($id);
		
		if($request->ajax())
		{
			return response()->json($borrar);
		}

	}

	public function agregarPrograma(Request $request)
	{
		$carreras = $this->carreraRepository->getModel()->with('semestres')->get();
		return response()->json($carreras);
	}

	public function attachPrograma($id, Request $request)
	{
		$user = User::find($id);
		$user->semestres()->attach($request->get('semProg'));
		return response()->json($user);
	}

}


