<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBudgetCompteTable extends Migration {

	public function up()
	{
		Schema::create('budget_compte', function(Blueprint $table) {
			$table->integer('budget_id')->unsigned();
			$table->integer('compte_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('budget_compte');
	}
}