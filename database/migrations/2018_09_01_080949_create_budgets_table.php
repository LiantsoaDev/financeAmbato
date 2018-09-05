<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBudgetsTable extends Migration {

	public function up()
	{
		Schema::create('budgets', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('realisation_id')->unsigned();
			$table->integer('entite_id')->unsigned();
			$table->integer('annee_id')->unsigned();
			$table->string('libelle', 150)->nullable();
			$table->decimal('montant')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('budgets');
	}
}