<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaissesTable extends Migration {

	public function up()
	{
		Schema::create('caisses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('entite_id')->unsigned();
			$table->integer('banque_id')->unsigned();
			$table->string('libelle', 150)->nullable();
			$table->string('type', 150);
			$table->decimal('montant')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('caisses');
	}
}