<?php namespace App;


use App\Entitis\Entity;


class Correo extends Entity {



	protected $table = 'correos';
	protected $fillable= ['name', 'email', 'mensaje'];


	public function users()
	{

		return $this->belongsToMany('App\User');

	}


}
