<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidads', function (Blueprint $table) {
            $table->increments('id');

            $table->string('materia');
            $table->string('seriacion');
            $table->string('clave');
            $table->string('semestre');
            $table->string('fecha');
            $table->text('objetivo');
            $table->string('asesor');
            $table->string('unidad');
            $table->string('tema');
            $table->text('actividadP');

            $table->integer('materia_id')->unsigned()->index();
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

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
        Schema::drop('unidads');
    }
}
