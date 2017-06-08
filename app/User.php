<?php namespace App;

use App\Entitis\Entity;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Entity implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract {

	use Authenticatable, CanResetPassword, HasRoleAndPermission;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'cuenta', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	
	public function respuestasDiagnostico()
	{
		return $this->hasMany('App\Administrador\EvaluacionDiagnostico\RespuestaDiagnostico');
	}

	public function resultadoDiag()
	{
		return $this->hasMany('App\Administrador\EvaluacionDiagnostico\ResultadoDiag');
	}

	public function resultados()
	{
		return $this->hasMany('App\Resultado');
	}

	public function respuestas()
	{
		return $this->belongsToMany('App\Respuesta');
	}

	public function respuestasDocentesUser()
	{
		return $this->hasMany('App\Administrador\EvaluacionMaestro\RespuestaDocente');
	}

	public function resultadoDocenteUser()
	{
		return $this->hasMany('App\Administrador\EvaluacionMaestro\ResultadoDocente');
	}

	public function respuestasUser()
	{
		return $this->hasMany('App\RespuestaUser');
	}

	public function imagenes()
	{
		return $this->hasMany('App\ImagenUser');
	}
	

	public function semestres()
	{
		return $this->belongsToMany('App\Semestre');
	}


	public function calificaciones()
	{
		return $this->hasMany('App\Calificacion');
	}

	public function planeacion()
	{
		return $this->hasOne('App\Planeacion');
	}

	public function datosDocente()
	{
		return $this->hasOne('App\DatosDocente');
	}

	public function materias()
	{

		return $this->belongsToMany('App\Materia');
	}

	public function carreras()
	{

		return $this->belongsToMany('App\Carrera');
	}

	
	public function correo()
	{

		return $this->belongsToMany('App\Correo');

	}

	
	public function comentarios()
	{

		return $this->hasMany('App\Comentario');
	}

	public function foros()
	{
		return $this->hasMany('App\Foro');
	}

	public function setPasswordAttribute($value)
    {
    	if (! empty($value)) {
    		
    		 $this->attributes['password'] =  bcrypt($value);
    	}

       
    }

	public function fileentry()
	{

		return $this->hasMany('App\Fileentry');
	}



	public function apoyo()
	{

		return $this->hasMany('App\Apoyo');
	}

	public function getRoleListAttribute()
	{

		return $this->roles->lists('id')->all();
	}

	public function getCarreraListAttribute()
	{

		return $this->carreras->lists('id')->all();
	}

	public function getSemestreListAttribute()
	{

		return $this->semestres->lists('id')->all();
	}


	public function getMateriaListAttribute()
	{

		return $this->materias->lists('id')->all();
	}

	public function hasNota(User $user, $act){


		return $this->calificaciones()->where('user_id', $user->id)->where('actividad_id', $act->id)->count();
	}


	public function hasArchivo(User $user, $act)
	{

		return $this->fileentries()->where('user_id', $user->id)->where('actividad_id', $act->id)->count();
	}

	
}
