<?php namespace App\Repository;

use App\Http\Requests;
use App\Http\Requests\Admin;
use App\Http\Requests\EditAdmin;
use App\Http\Requests\EditCordinador;
use App\User;
use App\Materia;
use App\DatosDocente;
use Bican\Roles\Models\Role;
use Auth;
use Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class UserRepository extends BaseRepository {


		public function getModel()
		{
			return new User();	

		}


		public function alumnosMenu(Request $request)
		{

			$alumnos = User::with('roles', 'carreras.semestres.materias.unidades.actividades')->paginate(5);
			return $alumnos;

		}


	public function listaUser(Request $request)
	{

		 $users =  User::with('imagenes', 'roles', 'materias', 'semestres.carrera')->select('users.*');
		 return $users;


	}

	public function buscarUser(Request $request)
	{

		$users = User::name($request->get('name'))->get();
		return $users;

	}

	

	public function materialApoyo(Request $request)
	{

		return  Auth::user()->apoyo;
	}

	public function createUser(Admin $request)
	{
		
		$user = User::create($request->all());
		$user->carreras()->attach($request->get('carrera_list'));
		$user->semestres()->attach($request->get('semestre_list'));
		$user->materias()->attach($request->get('materia_list'));
		$user->attachRole($request->get('role_list'));
		$usuario = $user->where('id', $user->id)->with('roles')->get();

		return $usuario;

	}

	
	public function updateUser(EditAdmin $request, $id)
	{

		$user = $this->search($id);
		$user->update($request->all());
		$user->roles()->sync($request->get('roles'));

		if($user->is('alm'))
		{
			$user->semestres()->sync($request->get('semes'));		
		}else if($user->is('prf'))
		{
			$user->materias()->sync($request->get('materias'));
		}

		return $user;
	}

	public function bajaCarrera($id, Request $request)
	{
		$alumno = $this->search($id);
		$alumno->carreras()->detach($request->get('crr_list'));
		$alumno->semestres()->detach($request->get('sem_list'));

		return $alumno;
	}


	public function crearAlumno(Request $request)
	{

		 $role = Role::find(22);
    	 $user = User::create($request->all());
         $user->attachRole($role);
         $user->carreras()->attach($request->input('carrera'));
         $user->semestres()->attach($request->input('semestre'));
         flash()->overlay('Ha sdo creado correctamente', 'El Alumno '. $user->name);
	}

	public function updateAlumno(Request $request, $id)
	{

	  $user = $this->search($id);
      $user->update($request->all());
      $user->carreras()->sync($request->input('carrera_list'));
      $user->semestres()->sync($request->input('semestre_list'));
      flash()->overlay('Fue editado correctamente', 'El usuario '. $user->name);
	}


	public function verCarrera(Request $request)
	{

		return Auth::user()->semestres()->name($request->get('name'))->paginate(5);

	}

	public function materiasProfesores(Request $request)
	{

		return  Auth::user()->materias()->name($request->get('name'))->paginate(5);

	}

	public function crearMaestro(Request $request)
	{

		$role = Role::where('name', 'profesor')->first();
		$user = User::create($request->all());
		$user->attachRole($role);
		$user->materias()->attach($request->input('materia_list'));
		return $user;
	}

	public function datosMaestro(Request $request)
	{	
		$ruta = public_path().'/curriculum/';
		$file = $request->file('curriculum');
		$filename = $file->getClientOriginalName();
		$existe = public_path().'/curriculum/'.$filename;

		if(!file_exists($existe))
		{
			$move = $file->move($ruta, $filename);	
			$user = DatosDocente::create([

			'formacion' => $request->get('formacion'),
			'celular' => $request->get('celular'),
			'antiguedad' => $request->get('antiguedad'),
			'curriculum' => $filename,
			'modelo' => $request->get('modelo'),
			'contrato' => $request->get('contrato'),
			'entrevista' => $request->get('entrevista'),
			'identidad' => $request->get('identidad'),
			'planeacion' => $request->get('planeacion'),
			'erom' => $request->get('erom'),
			'apa' => $request->get('apa'),
			'user_id' => $request->get('user_id')

			]);

			$user->campuses()->attach($request->input('campus'));
			return $user;

		}else{

			$move = $file->move($ruta, $file);

			$user = DatosDocente::create([

			'formacion' => $request->get('formacion'),
			'celular' => $request->get('celular'),
			'antiguedad' => $request->get('antiguedad'),
			'curriculum' => $file,
			'modelo' => $request->get('modelo'),
			'contrato' => $request->get('contrato'),
			'entrevista' => $request->get('entrevista'),
			'identidad' => $request->get('identidad'),
			'planeacion' => $request->get('planeacion'),
			'erom' => $request->get('erom'),
			'apa' => $request->get('apa'),
			'user_id' => $request->get('user_id')

			]);

			$user->campuses()->attach($request->input('campus'));
			return $user;
		}
	}

	public function updateMaestro(EditCordinador $request, $id)
	{

	  $user = $this->search($id);
      $user->update($request->all());
      $user->materias()->sync($request->input('materia_list'));
      flash()->overlay('Fue editado correctamente', 'El maestro '. $user->name);
	}


	public function delete($id)
	{

		$user = $this->search($id);
		$user->delete();
		flash()->overlay('ha sido borrado', 'El usuario ' . $user->name);
	}

	public function getNota($id)
	{

		 $promedio = 0; 
         $user = $this->search($id);
         $calificaciones =  $user->calificaciones()->get();

       foreach ($calificaciones as $calificacion) {
            foreach ($calificacion->rubricas as $rubrica) {

                $promedio += $rubrica->pivot->nota;
            }
        }
        
		return $promedio;
	}

	public function downloadPerfil($id)
	{
		$user = $this->search($id);
		$imagenes = $user->imagenes()->get();
		
		foreach ($imagenes as $imagen) {
			
			$filename = $imagen->img;
		}

		return $filename;
	}

}