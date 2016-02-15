<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubricas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('descripcion');
            $table->string('total');

            $table->integer('actividad_id')->unsigned()->index();
            $table->foreign('actividad_id')->references('id')->on('actividads')->onDelete('cascade');
            
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
        Schema::drop('rubricas');
    }
}
