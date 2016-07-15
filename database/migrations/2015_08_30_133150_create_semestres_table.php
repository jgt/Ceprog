<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('semestres', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');

			$table->integer('carrera_id')->unsigned()->index();
			$table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
			
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
		Schema::drop('semestres');
	}

}
