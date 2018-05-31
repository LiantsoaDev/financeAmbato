<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreditsTable extends Migration {

	public function up()
	{
		Schema::create('credits', function(Blueprint $table) {
			$table->increments('id');
			$table->decimal('montant');
			$table->string('type', 250)->nullable();
			$table->timestamps();
			$table->integer('mouvement_id')->unsigned();
			$table->integer('compte_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('credits');
	}
}