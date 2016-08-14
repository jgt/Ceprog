<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosibleRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posible_respuestas', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('name');
            $table->boolean('estado')->default(false);

            $table->integer('pregunta_docente_id')->unsigned();
            $table->foreign('pregunta_docente_id')->references('id')->on('pregunta_docentes')->onDelete('cascade');
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
        Schema::drop('posible_respuestas');
    }
}
