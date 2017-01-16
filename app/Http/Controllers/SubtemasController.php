<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subtemas;
use App\Repository\SubTemasRepository;
use App\Unidad;
use App\Imagenes;
use File as Archivo;

class SubtemasController extends Controller
{	
	private $subtemasRepository;
    
    public function __construct(SubTemasRepository $subtemasRepository)
    {
    	$this->subtemasRepository = $subtemasRepository;
    }

	public function storeSubtemas(Request $request)
	{
		$subtemas = Subtemas::create($request->all());
		return response()->json($subtemas);
	}

	public function editSubtemas($id, Request $request)
	{
		$subtemas = Unidad::find($id)->subtemas()->get();
		return response()->json($subtemas);
	}

	public function updateSubtemas($id, Request $request)
	{
		$subtema = Subtemas::find($id)->update($request->all());
		return response()->json($subtema);
	}

	public function showSubtema($id, Request $request)
	{
		$subtema = Subtemas::find($id);
		return response()->json($subtema);
	}

	public function deleteSubtemas($id, Request $request)
	{
		$subtema = Subtemas::find($id)->delete($id);
	}

	public function imagenSubtema($id, Request $request)
	{
		$img = $this->subtemasRepository->subirImagen($id, $request);
		return response()->json($img);
	}

	public function listImagenes($id, Request $request)
	{
		$imagenes = Subtemas::find($id)->imagenes()->get();
		return response()->json($imagenes);
	}

	public function borrarImg($id)
	{
		return $this->subtemasRepository->deleteImg($id);
	}

}
