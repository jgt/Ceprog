<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->string('ruta');
            
            $table->integer('subtema_id')->unsigned()->index();
            $table->foreign('subtema_id')->references('id')->on('subtemas')->onDelete('cascade');

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
        Schema::drop('imagenes');
    }
}
