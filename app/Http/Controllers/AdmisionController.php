<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Email;
use App\Semestre;
use App\User;
use App\Actividad;
use Bican\Roles\Models\Role;
use App\Materia;
use App\Carrera;
use App\Calificacion;
use Auth;
use App;
use Input;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Repository\CarreraRepository;
use App\Repository\SemestreRepository;
use App\Repository\MateriaRepository;
use App\Repository\ActividadRepository;
use App\Repository\CalificacionRepository;

class AdmisionController extends Controller {


    private $userRepository;
    private $carreraRepository;
    private $semestreRepository;
    private $materiaRepository;
    private $actividadRepository;
    private $calificacionRepository;

   public function __construct(

    UserRepository $userRepository,
    CarreraRepository $carreraRepository,
    SemestreRepository $semestreRepository,
    MateriaRepository $materiaRepository,
    ActividadRepository $actividadRepository,
    CalificacionRepository $calificacionRepository)
   {

      $this->userRepository = $userRepository;
      $this->carreraRepository = $carreraRepository;
      $this->semestreRepository = $semestreRepository;
      $this->materiaRepository = $materiaRepository;
      $this->actividadRepository = $actividadRepository;
      $this->calificacionRepository = $calificacionRepository;
   } 

	public function index()
	{

		return view('admision');
	}

 
	public function store(Email $request)
   {
       //guarda el valor de los campos enviados desde el form en un array
       $data = $request->all();
        $fromEmail = $request->get('Correo');
        $fromName = $request->get('Nombres');
 
       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
       \Mail::send('include.enviar', $data, function($message) use ($request, $fromEmail, $fromName)
       {
           //remitente
           $message->from($fromEmail, $fromName);

 
           //receptor
           $message->to(env('CONTACT_CEPROG'), env('CONTACT_UC'));
 
       });
        flash()->overlay('Su solicitud ha sido enviada sactifctoriamente', 'Gracias por preferirnos');

       return back();
   }



// CREAR Y EDITAR ALUMNO


  public function ver(Request $request)
   {
      $users = $this->userRepository->ListaUser($request);
      return view('tutores.listaAlumnos', compact('users'));
   }


   public function createUser()
  { 
    $carrera = $this->carreraRepository->searchList();
    $semestre = $this->semestreRepository->searchList();
    return view('tutores.crearAlumno', compact('carrera', 'semestre'));
  }



  public function storeUser(Request $request)
  {

     $this->userRepository->crearAlumno($request);
     return redirect('ver');
  }



    public function editar($id)
   {

      $user = $this->userRepository->search($id);
      $carreras = $this->carreraRepository->searchList();
      $semestres = $this->semestreRepository->searchList();
      return view('tutores.editarAlumno', compact('user', 'carreras', 'semestres'));
   }

   public function update($id, Request $request)
   {
      
      $this->userRepository->updateAlumno($request, $id);
      return redirect('ver');
   }

   // Acciones del tutor //

   public function verCarreraTutores(Request $request)
  {

    $semestres = $this->userRepository->verCarrera($request);
    return view('carreraTutores', compact('semestres'));
  }

  public function mtmTutores($id)
  {

    $semestre = $this->semestreRepository->search($id);
    $materias = $this->semestreRepository->getMaterias($id);
    return view('tutores.almTutores', compact('materias', 'semestre'));

  }

  public function actTutores($id)
  {

    $materia = $this->materiaRepository->search($id);
    $actividades = $this->materiaRepository->getActividades($id);
    return view('tutores.actTutores', compact('materia', 'actividades'));

  }

 public function cloTutores($id, Request $request)
  {

    $actividad = $this->actividadRepository->search($id);
    $alumnos = $this->actividadRepository->notaAct($id);

    if($request->ajax())
    {
        return response()->json($alumnos);
    }

    return view('tutores.cloTutores', compact('actividad'));

  }

  public function sinNota($id)
  {

    $actividad = $this->actividadRepository->search($id);
    return view('tutores.sinNota', compact('actividad'));
  }

  public function notaTutores($id, Request $request)
  {   
      
       $calificacion = $this->calificacionRepository->search($id);
       $calAlum = $this->calificacionRepository->calificacionAlumnos($id);
       $detalles = [

            'calAlum' => $calAlum,
            'calificacion' => $calificacion 

       ];

       if($request->ajax())
       {

          return response()->json($detalles);
       }

       return view('tutores.notaTutores', compact('calificacion'));
   }

}
