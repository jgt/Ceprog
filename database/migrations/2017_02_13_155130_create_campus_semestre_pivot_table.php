<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusSemestrePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_semestre', function (Blueprint $table) {
            $table->integer('campus_id')->unsigned()->index();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->integer('semestre_id')->unsigned()->index();
            $table->foreign('semestre_id')->references('id')->on('semestres')->onDelete('cascade');
            $table->primary(['campus_id', 'semestre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campus_semestre');
    }
}
