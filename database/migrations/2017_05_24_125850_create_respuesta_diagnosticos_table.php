<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_diagnosticos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pregunta_diag_id')->unsigned()->index();
            $table->foreign('pregunta_diag_id')->references('id')->on('pregunta_diags')->onDelete('no action');
            $table->integer('evaposresp_id')->unsigned()->index();
            $table->foreign('evaposresp_id')->references('id')->on('evaposresps')->onDelete('no action');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');

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
        Schema::drop('respuesta_diagnosticos');
    }
}
