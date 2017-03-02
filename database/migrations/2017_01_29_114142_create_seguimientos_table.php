<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('docente');
            $table->string('nivel');
            $table->string('programa');
            $table->string('materia');
            $table->string('semestre');
            $table->string('grupo');
            $table->string('d1');
            $table->string('d2');
            $table->string('d3');
            $table->string('d4');
            $table->string('d5');
            $table->string('planeacion');
            $table->string('guiaT');
            $table->string('examen');
            $table->string('controlG');
            $table->string('examenActa');
            $table->string('rptAlumnos');
            $table->string('reunionUno');
            $table->string('reunionDos');
            $table->string('reunionTres');
            $table->string('reunionCuatro');
            $table->string('reunionCinco');
            $table->string('remite');
            $table->string('asunto');
            $table->text('solucion');
            $table->string('estatus');
            $table->string('observacionUno');
            $table->string('observacionDos');
            $table->string('observacionTres');
            $table->string('observacionCuatro');
            $table->string('observacionCinco');
            $table->string('opnEstudiante');

             $table->integer('datos_docente_id')->unsigned()->index();
             $table->foreign('datos_docente_id')->references('id')->on('datos_docentes')->onDelete('cascade');

             $table->integer('materia_id')->unsigned()->index();
             $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seguimientos');
    }
}
