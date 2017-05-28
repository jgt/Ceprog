<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaposrespsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaposresps', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->boolean('estado')->default(false);
            $table->integer('pregunta_diag_id')->unsigned();
            $table->foreign('pregunta_diag_id')->references('id')->on('pregunta_diags')->onDelete('cascade');

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
        Schema::drop('evaposresps');
    }
}
