<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComptesTable extends Migration {

	public function up()
	{
		Schema::create('comptes', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('compte');
			$table->string('libelle', 250);
			$table->string('type', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('comptes');
	}
}