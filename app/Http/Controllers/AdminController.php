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
use Auth;
use Input;
use Hash;
use App;

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

		if($request->ajax())
		{
			return response()->json(User::all());
		}

		return view('lista', compact('users'));
	}
	
	public function create()
	{	

    $roles = $this->roleRepository->searchList();
	return view('create.user', compact('roles'));
	}

	
	public function store(Admin $request)
	{

		$user = $this->userRepository->createUser($request);

		if($request->ajax())
		{
			return response()->json(['success' => $user]);
		}

		return redirect()->back();
	}

	
	public function show($id)
	{
		$users = $this->userRepository->search($id);
		return view('show', compact('users'));
	}

	
	public function edit($id, Request $request)
	{	
		
		$user = $this->userRepository->search($id);
        $carreras = $this->carreraRepository->searchList();
        $semestres = $this->semestreRepository->searchList();
        $materias = $this->materiaRepository->showMaterias();
		$role = $this->roleRepository->searchList();
		/*
		$detalle = [

				'id' => $this->userRepository->search($id)->id,
				'name' => $this->userRepository->search($id)->name,
				'cuenta' => $this->userRepository->search($id)->cuenta,
				'password' => $this->userRepository->search($id)->password,
				'roles' => $this->userRepository->search($id)->roles()->get(),
				'semestres' => $this->userRepository->search($id)->semestres()->get(),
				'materias' => $this->userRepository->search($id)->materias()->get(),
				'carreras' => $this->userRepository->search($id)->carreras()->get()


		];

		if($request->ajax())
		{
			return response()->json($detalle);
		}
		*/

		return view('edit.user', compact('user', 'role', 'carreras', 'semestres', 'materias'));
	}

	public function update($id, EditAdmin $request)
	{
		
		$this->userRepository->updateUser($request, $id);
		return redirect('admin');
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

}




		
