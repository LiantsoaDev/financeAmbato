<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDebitsTable extends Migration {

	public function up()
	{
		Schema::create('debits', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('mouvement_id')->unsigned();
			$table->integer('compte_id')->unsigned();
			$table->decimal('montant')->nullable();
			$table->string('type', 50)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('debits');
	}
}