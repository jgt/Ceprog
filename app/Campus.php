<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    
    protected $fillable = ['clave', 'nombre', 'psu', 'razonSocial', 'rfc', 'pais', 'estado', 'municipio', 'colonia', 'direccion', 'cp'];



    public function datosDocentes()
    {
    	return $this->belongsToMany('App\DatosDocente');
    }

    public function carreas()
    {
    	return $this->belongsToMany('App\Carrera');
    }
}