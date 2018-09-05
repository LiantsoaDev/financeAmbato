<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealisationsTable extends Migration {

	public function up()
	{
		Schema::create('realisations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('budget_id')->unsigned();
			$table->string('libelle', 150);
			$table->date('date');
			$table->decimal('montant')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('realisations');
	}
}