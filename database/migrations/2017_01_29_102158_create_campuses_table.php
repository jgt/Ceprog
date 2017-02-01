<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('nombre');
            $table->string('psu');
            $table->string('razonSocial');
            $table->string('rfc');
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->string('colonia');
            $table->string('direccion');
            $table->string('cp');
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
        Schema::drop('campuses');
    }
}
