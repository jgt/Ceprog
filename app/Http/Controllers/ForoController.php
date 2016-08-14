<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Comentario;
use Auth;
use App\Foro;
use App\Materia;
use App\Carrera;
use Input;

use Illuminate\Http\Request;

class ForoController extends Controller {

	

	public function listForo(Request $request)
	{

		$foros = Foro::name($request->get('name'))->paginate(50);
		
		if($request->ajax())
		{

			return response()->json($foros);
		}
	}
	
	public function foro(Request $request)
	{

		$this->validate($request, [


			'name' => 'required|max:120',
			'tipo' => 'required',
			'materia_id' => 'required'

			]);

		$foro = Foro::create($request->all());

	}

	public function showForo($id, Request $request)
	{
		$foro = Foro::find($id);

		if($request->ajax())
		{
			return response()->json($foro);
		}


	}


	public function deleteForo($id)
	{

		$foro = Foro::find($id);
		$foro->delete();

	}



	public function comentario($id, Request $request)
	{	 
 		$comentarios = Foro::find($id)->with('comentarios.users.imagenes')->get();
		
		if($request->ajax())
		{

			return response()->json($comentarios);
		}
	}



	public function store($id, Request $request)

	{

		$this->validate($request, [

			'comment' => 'required|max:250',
			
			]);


		$comentario = new Comentario($request->all());
		$comentario->user_id = Auth::user()->id;
		$comentario->users;

		$foro = Foro::findOrFail($id);
		$foro->comentarios()->save($comentario); 

		if($request->ajax())
		{

			return response()->json($comentario);
		}

	}


	public function forosMaterias($id, Request $request)
	{

		$foros = Materia::find($id)->foros()->get();

		if($request->ajax())
		{

			return response()->json($foros);
		}

	}

}
