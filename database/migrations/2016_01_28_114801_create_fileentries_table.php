<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileentries', function (Blueprint $table) {

            $table->increments('id');

            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->text('mensaje');
            $table->string('usuario');

            $table->integer('actividad_id')->unsigned()->index();
            $table->foreign('actividad_id')->references('id')->on('actividads')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('fileentries');
    }
}
