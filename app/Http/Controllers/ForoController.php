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

		$foros = Foro::name($request->get('name'))->paginate(5);
		
		if($request->ajax())
		{

			return response()->json($foros);
		}
	}
	
	public function create()
	{

		$materias = Materia::lists('creditos', 'id');
		return view('create.foro', compact('materias'));
	}


	public function foro(Request $request)
	{

		$this->validate($request, [


			'title' => 'required|max:120',
			'materia_id' => 'required'

			]);

		$foro = Foro::create($request->all());

	}

	public function editForo($id)
	{

		$foro = Foro::find($id);
		$materias = Materia::lists('creditos', 'id');
		return view('edit.foro', compact('materias', 'foro'));
	}


	public function updateForo($id, Request $request)
	{

		$foro = Foro::find($id);
		$foro->update($request->all());

		flash()->overlay('ha sido editado.', 'El foro '.$foro->title);
		return redirect()->route('listForo');
	}

	public function deleteForo($id)
	{

		$foro = Foro::find($id);
		$foro->delete();

	}



	public function comentario($id, Request $request)
	{	 
 		$comentarios = Foro::find($id)->with('comentarios.users')->get();
		
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
