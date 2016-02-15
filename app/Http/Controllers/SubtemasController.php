<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subtemas;
use App\Unidad;

class SubtemasController extends Controller
{
    

	public function storeSubtemas(Request $request)
	{

		$subtemas = Subtemas::create($request->all());

		if($request->ajax())
		{
			return response()->json($subtemas);
		}
	}

	public function editSubtemas($id, Request $request)
	{

		$unidad = Unidad::find($id);
		$subtemas = $unidad->subtemas()->get();

		if($request->ajax())
		{

			return response()->json($subtemas);
		}

	}

	public function updateSubtemas($id, Request $request)
	{

		$subtema = Subtemas::find($id);

		$subtema->update($request->all());

		if($request->ajax())
		{

			return response()->json($subtema);
		}

	}

	public function showSubtema($id, Request $request)
	{

		$subtema = Subtemas::find($id);

		if($request->ajax())
		{
			return response()->json($subtema);
		}
	}


	public function deleteSubtemas($id, Request $request)
	{

		$subtema = Subtemas::find($id);
		$subtema->delete($id);
	}

}
