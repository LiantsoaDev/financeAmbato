<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaissesTable extends Migration {

	public function up()
	{
		Schema::create('caisses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle', 200)->nullable();
			$table->string('type', 200)->nullable();
			$table->decimal('montant')->nullable();
			$table->timestamps();
			$table->integer('entite_id')->unsigned();
			$table->integer('banque_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('caisses');
	}
}