<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraExamendocentePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_examen_docente', function (Blueprint $table) {
            $table->integer('carrera_id')->unsigned()->index();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->integer('examen_docente_id')->unsigned()->index();
            $table->foreign('examen_docente_id')->references('id')->on('examen_docentes')->onDelete('cascade');
            $table->primary(['carrera_id', 'examen_docente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carrera_examen_docente');
    }
}
