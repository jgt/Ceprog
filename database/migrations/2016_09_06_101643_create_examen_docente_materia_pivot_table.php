<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamendocenteMateriaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_docente_materia', function (Blueprint $table) {
            $table->integer('examen_docente_id')->unsigned()->index();
            $table->foreign('examen_docente_id')->references('id')->on('examen_docentes')->onDelete('cascade');
            $table->integer('materia_id')->unsigned()->index();
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->primary(['examen_docente_id', 'materia_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('examen_docente_materia');
    }
}
