<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    
    protected $fillable = ['name', 'descripcion', 'filename', 'original_filename', 'mime', 'ruta'];
}
