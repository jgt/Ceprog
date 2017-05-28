<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraEvadigPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_evadig', function (Blueprint $table) {
            $table->integer('carrera_id')->unsigned()->index();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->integer('evadig_id')->unsigned()->index();
            $table->foreign('evadig_id')->references('id')->on('evadigs')->onDelete('cascade');
            $table->primary(['carrera_id', 'evadig_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carrera_evadig');
    }
}
