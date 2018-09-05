<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnneesTable extends Migration {

	public function up()
	{
		Schema::create('annees', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('budget_id')->unsigned();
			$table->date('annee');
			$table->boolean('options')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('annees');
	}
}