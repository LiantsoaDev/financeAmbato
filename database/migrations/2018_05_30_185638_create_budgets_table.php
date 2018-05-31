<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBudgetsTable extends Migration {

	public function up()
	{
		Schema::create('budgets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle', 250)->nullable();
			$table->decimal('montant')->nullable();
			$table->integer('compte_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('budgets');
	}
}