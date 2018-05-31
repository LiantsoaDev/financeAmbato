<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntitesTable extends Migration {

	public function up()
	{
		Schema::create('entites', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom', 200)->nullable();
			$table->string('type', 200)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('entites');
	}
}