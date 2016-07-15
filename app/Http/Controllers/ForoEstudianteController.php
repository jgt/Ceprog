<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Comentario;
use Auth;
use App\Foro;
use Input;

use Illuminate\Http\Request;

class ForoEstudianteController extends Controller {

	

	public function comentario($id, Request $request)
	{	 
 		$foro = Foro::find($id);
 		$comentarios = $foro->comentarios()->orderBy('id', 'DESC')->name($request->get('name'))->paginate(3);
		return view('create.foroestudiante', compact('comentarios','foro'));
	}

}
