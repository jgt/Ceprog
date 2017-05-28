<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaDiagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('pregunta_diags', function (Blueprint $table) {

            $table->increments('id');

            $table->string('contador');
            $table->string('contenido');
            $table->string('valor');
            $table->string('imagen');
            
            $table->integer('evadig_id')->unsigned();
            $table->foreign('evadig_id')->references('id')->on('evadigs')->onDelete('cascade');

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');


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
        Schema::drop('pregunta_diags');
    }
}
