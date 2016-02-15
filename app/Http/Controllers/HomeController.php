<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = [
            'Profesores'          => ['route' => 'menu'],
            'Alumnos'         => ['route' => 'menu'],
            'Administrador'    => ['route' => 'admin.index'],
            'Tutorias'         => ['route' => 'menu'],
            'Cordinador'      => ['route' => 'menu'],
            'Contactanos'     => ['url' => 'info'],
           // 'Cambio de contraseña' => ['route' => 'reset'],
            'Solicitud Online' => ['url' => 'admision']
        ];
        return view('home', compact('items'));
	}

}
