<?php namespace App\Http\ViewComposer;


use Illuminate\Contracts\View\View;
use App\User;
use Input;

class ConsultaAlumnos {


	public function compose($view)
	{

		$view->users = User::name(Input::get('name'))->paginate(5);
	}
}