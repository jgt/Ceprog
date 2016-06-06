<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
		'Styde\Html\Alert\Middleware::class',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [

		'adminMaestro' => 'App\Http\Middleware\AdminMaestro',
		'alumnosAdmision' => 'App\Http\Middleware\AlumnosAdmision',
		'alumnosMaestros' => 'App\Http\Middleware\AlumnosMaestros',
		'cordinador' => 'App\Http\Middleware\Cordinador',
		'admision' => 'App\Http\Middleware\Admision',
		'alumnos' => 'App\Http\Middleware\Alumnos',
		'maestro' => 'App\Http\Middleware\Maestro',
		'admin' => 'App\Http\Middleware\Admin',
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
		'role' => '\Bican\Roles\Middleware\VerifyRole::class',
    	'permission' => '\Bican\Roles\Middleware\VerifyPermission::class',
    	'level' => '\Bican\Roles\Middleware\VerifyLevel::class',
		
	];

}
