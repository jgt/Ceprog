<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('examenes', function(Blueprint $table)

        {

            $table->increments('id');

            $table->string('modalidad');
            $table->string('catedratico');
            $table->string('fecha');
            $table->string('fechaF');
            $table->string('modulo');
            $table->string('hora');

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
        Schema::drop('examenes');
    }
}
