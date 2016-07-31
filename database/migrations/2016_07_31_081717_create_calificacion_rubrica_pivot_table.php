<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionRubricaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_rubrica', function (Blueprint $table) {

            $table->string('nota');

            $table->integer('calificacion_id')->unsigned()->index();
            $table->foreign('calificacion_id')->references('id')->on('calificacions')->onDelete('cascade');
            $table->integer('rubrica_id')->unsigned()->index();
            $table->foreign('rubrica_id')->references('id')->on('rubricas')->onDelete('cascade');
            $table->primary(['calificacion_id', 'rubrica_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calificacion_rubrica');
    }
}
