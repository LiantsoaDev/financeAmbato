<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDebitsTable extends Migration {

	public function up()
	{
		Schema::create('debits', function(Blueprint $table) {
			$table->increments('id');
			$table->decimal('montant')->nullable();
			$table->string('type', 250)->nullable();
			$table->timestamps();
			$table->integer('mouvement_id')->unsigned();
			$table->integer('compte_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('debits');
	}
}