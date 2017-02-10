<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin;
use App\Http\Requests\EditAdmin;
use Bican\Roles\Models\Role;
use App\Materia;
use App\User;
use App\Carrera;
use App\Semestre;
use App\Campus;
use Bican\Roles\Models;
use Auth;
use Input;
use Hash;
use App;
use Datatables;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Repository\MateriaRepository;
use App\Repository\RoleRepository;
use App\Repository\CarreraRepository;
use App\Repository\SemestreRepository;

class AdminController extends Controller {


	private $userRepository;
    private $materiaRepository;
    private $roleRepository;
    private $carreraRepository;
    private $semestreRepository;

	public function __construct(

    UserRepository $userRepository, 
    MateriaRepository $materiaRepository,
    RoleRepository $roleRepository,
    CarreraRepository $carreraRepository,
    SemestreRepository $semestreRepository)
	{

	$this->userRepository = $userRepository;
    $this->materiaRepository = $materiaRepository;
    $this->roleRepository = $roleRepository;
    $this->carreraRepository = $carreraRepository;
    $this->semestreRepository = $semestreRepository;
	}

	
	public function index(Request $request)
	{	

		$users = $this->userRepository->listaUser($request);

		 return Datatables::of($users)
		 ->addColumn('img', function (User $user) {
                    return $user->imagenes->map(function($imagenes) {
                        return str_limit($imagenes->img, 30, '...');
                    })->implode('<br>');
                })
		 ->make(true);
	}

	public function buscarUser(Request $request)
	{
		$users = $this->userRepository->buscarUser($request);

		if($request->ajax())
		{
			return response()->json($users);
		}

	}
	
	public function create(Request $request)
	{	

    $roles = Role::all();
    $campus = Campus::get();
    $carreras = Carrera::with('semestres')->get();
    $materias = Materia::all();

    $arreglo = [

    	'roles' => $roles,
    	'carreras' => $carreras,
    	'materias' => $materias,
    	'campus' => $campus

    ];
	
		return response()->json($arreglo);
	}

	public function store(Admin $request)
	{
		$user = $this->userRepository->createUser($request);
		return response()->json($user);
	}

	public function show($id, Request $request)
	{
		$users = $this->userRepository->search($id)->where('id', $id)->with('roles')->get();
		return response()->json($users);
	}

	public function edit($id, Request $request)
	{	
		
		$user = $this->userRepository->search($id)->where('id', $id)->with('roles', 'carreras.semestres.materias')->get();
		$carreras = Carrera::all();
		$semestres = Semestre::all();
		$materias = Materia::all();
		$roles = Role::all();
		$userMaterias = $this->userRepository->search($id);

		$detalles = [

			'user' => $user,
			'carreras' => $carreras,
			'semestres' => $semestres,
			'materias' => $materias,
			'roles' => $roles

		];
		
		return response()->json($detalles);

	}

	public function update($id, EditAdmin $request)
	{
		$user = $this->userRepository->updateUser($request, $id);
		return response()->json($user);
	}

	
	public function destroy($id)
	{

    $this->userRepository->delete($id);
		return redirect('admin');
	}

	public function delete($id)
	{
		$this->userRepository->delete($id);
		return redirect('admin');
	}

	public function picturePerfil($id)
	{
		$imagen = $this->userRepository->downloadPerfil($id);
		$public_path = public_path();
     	$file =  $public_path.'/imagen/'.$imagen;
		return response()->download($file);
	}

	public function notification($id)
	{
		$user = $this->userRepository->search($id)->where('id', $id)->with('imagenes')->get();
		return response()->json($user);
	}

	public function downCarrera($id, Request $request)
	{
		$alumno = $this->userRepository->bajaCarrera($id, $request);
		return response()->json($alumno);
	}

}




		
