<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusCarreraPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_carrera', function (Blueprint $table) {
            $table->integer('campus_id')->unsigned()->index();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->integer('carrera_id')->unsigned()->index();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->primary(['campus_id', 'carrera_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campus_carrera');
    }
}
