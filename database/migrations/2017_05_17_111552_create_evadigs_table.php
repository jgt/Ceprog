<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvadigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evadigs', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('name');
            $table->string('modalidad');
            $table->string('modulo');
            $table->string('fecha');
            $table->string('fechaF');

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
        Schema::drop('evadigs');
    }
}
