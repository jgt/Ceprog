<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Rubricas;
use App\Actividad;
use App\Rubrica;
use Datatables;

use Illuminate\Http\Request;

class RubricaController extends Controller {

	
	public function storeRubrica(Rubricas $request)
	{
		$rubrica = Rubrica::create($request->all());
		return response()->json($rubrica);
	}

	public function listRubrica($id, Request $request)
	{
		$actividad = Actividad::find($id);
        $rubricas = $actividad->rubricas()->get();
        return response()->json($rubricas);
	}

	public function editRubrica($id, Request $request)
	{
		$rubrica = Rubrica::find($id);
		return response()->json($rubrica);
	}

	public function updateRubrica($id, Request $request)
	{
		$rubricas = Rubrica::find($id)->update($request->all());
		return response()->json($rubricas);
	}

	public function deleteRubrica($id)
	{
		$rubrica = Rubrica::find($id);

		if(!$rubrica->hasCalificacion($id))
		{
			$rubrica = Rubrica::find($id)->delete($id);
		}else{

			abort('404', 'error al procesar la solicitud.');
		}
	}

}

