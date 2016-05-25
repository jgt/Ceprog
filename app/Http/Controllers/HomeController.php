<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\MateriaRepository;
use App\Repository\ActividadRepository;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Repository\CarreraRepository;
use App\Repository\SemestreRepository;
use App\Tutorial;
use Auth;
use App\Carrera;
use App;

class HomeController extends Controller {


	private $materiaRepository;
    private $actividadRepository;
    private $userRepository;
    private $roleRepository;
    private $carreraRepository;
    private $semestreRepository;

    public function __construct(

        MateriaRepository $materiaRepository,
        ActividadRepository $actividadRepository,
        UserRepository $userRepository,
        CarreraRepository $carreraRepository,
        SemestreRepository $semestreRepository,
        RoleRepository $roleRepository)
    {

        $this->materiaRepository = $materiaRepository;
        $this->actividadRepository = $actividadRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->carreraRepository = $carreraRepository;
        $this->semestreRepository = $semestreRepository;

    }

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
	public function index(Request $request)
	{	
		 	$materias = $this->userRepository->materiasProfesores($request);
	        $mta = $this->materiaRepository->searchList();
	        $semestres = $this->semestreRepository->searchList();
	        $carreras = $this->carreraRepository->searchList();
	        $roles = $this->roleRepository->searchList();
	        $users = $this->userRepository->listaUser($request);
	        $materiasForo = $this->materiaRepository->showMaterias();
	        $alumnos = $this->userRepository->alumnosMenu($request);

         if($request->ajax())
        {
            return response()->json($alumnos);
        }

        return view('home', compact('materias', 'roles', 'users', 'materiasForo', 'carreras', 'mta', 'semestres', 'alumnos'));
		
	}


}
