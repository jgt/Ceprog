<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    
	protected $fillable = [

		'docente',
		'nivel',
		'programa',
		'materia',
		'semestre',
		'grupo',
		'd1',
		'd2',
		'd3',
		'd4',
		'd5',
		'planeacion',
		'guiaT',
		'examen',
		'controlG',
		'examenActa',
		'rptAlumnos',
		'reunionUno',
		'reunionDos',
		'reunionTres',
		'reunionCuatro',
		'reunionCinco',
		'remite',
		'asunto',
		'solucion',
		'estatus',
		'observacionUno',
		'observacionDos',
		'observacionTres',
		'observacionCuatro',
		'observacionCinco',
		'opnEstudiante',
		'datos_docente_id',
		'materia_id'

	];


    public function datosDocente()
    {
    	return $this->belongsTo('App\DatosDocente');
    }

     public function materia()
    {
    	return $this->belongsTo('App\Materia');
    }
}
