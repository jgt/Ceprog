<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');


            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->string('ruta');
            
            $table->integer('unidad_id')->unsigned()->index();
            $table->foreign('unidad_id')->references('id')->on('unidads')->onDelete('cascade');

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
        Schema::drop('videos');
    }
}
