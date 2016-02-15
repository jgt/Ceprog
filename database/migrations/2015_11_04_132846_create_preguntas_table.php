<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contenido');
            $table->text('distraptorUno');
            $table->text('distraptorDos');
            $table->text('distraptorTres');
            $table->text('correcta');
            $table->string('valor');

            $table->integer('examen_id')->unsigned();
            $table->foreign('examen_id')->references('id')->on('examenes')->onDelete('cascade');

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
        Schema::drop('preguntas');
    }
}
