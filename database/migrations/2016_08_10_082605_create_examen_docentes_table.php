<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_docentes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('ciudad');
            $table->string('carrera');
            $table->string('catedratico');
            $table->string('modalidad');
            $table->string('modulo');
            $table->string('fecha');
            $table->string('fechaF');

            $table->integer('materia_id')->unsigned();
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
        Schema::drop('examen_docentes');
    }
}
