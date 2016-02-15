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
		return view('listForo', compact('foros'));
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

		flash()->overlay('ha sido creado.', 'Nuevo ' . $foro->title);

		return redirect()->back();

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

		flash()->overlay('Ha sido borrado', 'El foro '.$foro->title);
		return redirect()->route('listForo');

	}



	public function comentario($id, Request $request)
	{	 
 		$foro = Foro::find($id);
 		$comentarios = $foro->comentarios()->orderBy('id', 'DESC')->name($request->get('name'))->paginate(3);
		return view('create.preguntas', compact('comentarios','foro'));
	}



	public function store($id, Request $request)

	{

		$this->validate($request, [

			'comment' => 'required|max:250',
			'link' => 'url'


			]);


		$comentario = new Comentario($request->all());
		$comentario->user_id = Auth::user()->id;

		$foro = Foro::findOrFail($id);
		$foro->comentarios()->save($comentario); 

		if(!$request->ajax())
		{

			return response()->json([

				'foro' => $foro,
				'comentario' => $comentario

				]);
		}

		return redirect()->back();
	}



	

}
