<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealisationsTable extends Migration {

	public function up()
	{
		Schema::create('realisations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle', 300)->nullable();
			$table->date('date')->nullable();
			$table->timestamps();
			$table->decimal('montant')->nullable();
			$table->integer('budget_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('realisations');
	}
}