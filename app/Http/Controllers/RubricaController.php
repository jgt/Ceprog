<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Actividad;
use App\Rubrica;

use Illuminate\Http\Request;

class RubricaController extends Controller {

	

	public function create($id)
	{

		$actividad = Actividad::find($id);
		$rubricas = $actividad->rubricas()->count();

		return view('rubrica', compact('actividad', 'rubricas'));
	}


	public function storeRubrica(Request $request)
	{

		$this->validate($request, [

				'name' => 'required',
				'descripcion' => 'required',
				'total' => 'required|numeric|min:0|max:30',
				'actividad_id' => 'required'


			]);

		$rubrica = Rubrica::create($request->all());

		if($request->ajax())
		{
			return response()->json($rubrica);
		}

		flash()->overlay('ha sido creada correctamente', 'La rubrica '. $rubrica->name);

		return redirect()->back();

	}

	public function listRubrica($id, Request $request)
	{

		$actividad = Actividad::find($id);
		$rubricas = $actividad->rubricas()->get();

		if($request->ajax())
		{

			return response()->json($rubricas);
		}

		return view('listrubrica', compact('rubricas'));
	}


	public function editRubrica($id, Request $request)
	{
		$rubrica = Rubrica::find($id);

		if($request->ajax())
		{
			return response()->json($rubrica);
		}
	}


	public function updateRubrica($id, Request $request)
	{
		$rubricas = Rubrica::find($id);

		$rubricas->update($request->all());

	}

	public function deleteRubrica($id)
	{

		$rubrica = Rubrica::find($id);
		$rubrica->delete($id);

	}

}

