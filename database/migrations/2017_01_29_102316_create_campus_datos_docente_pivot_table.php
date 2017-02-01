<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusDatosDocentePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_datos_docente', function (Blueprint $table) {
            $table->integer('campus_id')->unsigned()->index();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->integer('datos_docente_id')->unsigned()->index();
            $table->foreign('datos_docente_id')->references('id')->on('datos_docentes')->onDelete('cascade');
            $table->primary(['campus_id', 'datos_docente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campus_datos_docente');
    }
}
