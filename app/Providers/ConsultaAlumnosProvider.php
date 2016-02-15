<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConsultaAlumnosProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer([
			
			'administrador/listaMaestro',
			'administrador/listaAlumnos',
			'administrador/Tutor',
			'listaCordinador'

		], 'App\Http\ViewComposer\ConsultaAlumnos');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
