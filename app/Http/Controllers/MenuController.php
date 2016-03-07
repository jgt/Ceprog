<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\MateriaRepository;
use App\Repository\ActividadRepository;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Tutorial;

class MenuController extends Controller
{
    

    private $materiaRepository;
    private $actividadRepository;
    private $userRepository;
    private $roleRepository;

    public function __construct(

        MateriaRepository $materiaRepository,
        ActividadRepository $actividadRepository,
        UserRepository $userRepository,
        RoleRepository $roleRepository)
    {

        $this->materiaRepository = $materiaRepository;
        $this->actividadRepository = $actividadRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;

    }

    public function index(Request $request)
    {

        $materias = $this->userRepository->materiasProfesores($request);
        $roles = $this->roleRepository->searchList();
        $users = $this->userRepository->listaUser($request);
        $materiasForo = $this->materiaRepository->showMaterias();

        return view('include.menu', compact('materias', 'roles', 'users', 'materiasForo'));
    }


}
