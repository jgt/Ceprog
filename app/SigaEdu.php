<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SigaEdu extends Model
{
    
    protected $connection = 'edu';

    protected $table = 'Empleados';

    protected $fillable = ['Paterno', 'Materno', 'Nombre', 'FechaNacimiento', 'LugarNacimiento', 'Nacionalidad', 'Edad', 'Sexo', 'RFC', 'CURP', 'Direccion', 'IDColonia', 'TelCasa', 'TelCelular', 'Fax', 'EMail', 'EstadoCivil', 'NombreConyuge', 'FechaRegistro', 'CuentaBancaria', 'AntiguedadLaboralUVG', 'CedulaProfesional', 'IDOcupacion', 'IDProfesion', 'IDBanco'];
}
