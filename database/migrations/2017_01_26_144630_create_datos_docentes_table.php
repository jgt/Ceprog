<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formacion');
            $table->string('celular');
            $table->string('antiguedad');
            $table->string('curriculum');
            $table->string('modelo');
            $table->string('contrato');
            $table->string('entrevista');
            $table->string('identidad');
            $table->string('planeacion');
            $table->string('erom');
            $table->string('apa');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('datos_docentes');
    }
}
