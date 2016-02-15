<?php 

function calificacion()

{

$calificacion =\App\calificacion::all();

return $calificacion;


}

function upper($str)
{

	return strtoupper($str);
}
