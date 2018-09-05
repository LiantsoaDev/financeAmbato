<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMouvementsTable extends Migration {

	public function up()
	{
		Schema::create('mouvements', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle', 150)->nullable();
			$table->date('date')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mouvements');
	}
}