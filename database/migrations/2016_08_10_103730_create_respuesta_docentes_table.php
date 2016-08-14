<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_docentes', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('pregunta_docente_id')->unsigned()->index();
            $table->foreign('pregunta_docente_id')->references('id')->on('pregunta_docentes')->onDelete('no action');

            $table->integer('posible_respuesta_id')->unsigned()->index();
            $table->foreign('posible_respuesta_id')->references('id')->on('posible_respuestas')->onDelete('no action');
            
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');

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
        Schema::drop('respuesta_docentes');
    }
}
