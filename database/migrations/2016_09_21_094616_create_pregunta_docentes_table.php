<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_docentes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('contador');
            $table->text('contenido');
            $table->enum('opciones', ['2', '3'])->default('2');
            $table->string('valor');

            $table->integer('examen_docente_id')->unsigned();
            $table->foreign('examen_docente_id')->references('id')->on('examen_docentes')->onDelete('cascade');

            $table->integer('rango_id')->unsigned();
            $table->foreign('rango_id')->references('id')->on('rangos')->onDelete('cascade');

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
        Schema::drop('pregunta_docentes');
    }
}
