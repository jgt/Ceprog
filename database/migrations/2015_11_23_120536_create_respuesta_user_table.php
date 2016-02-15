<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_user', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('pregunta_id')->unsigned()->index();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('no action');
            $table->integer('respuesta_id')->unsigned()->index();
            $table->foreign('respuesta_id')->references('id')->on('respuestas')->onDelete('no action');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('respuesta_user');
    }
}
