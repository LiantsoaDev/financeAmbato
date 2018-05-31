<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanquesTable extends Migration {

	public function up()
	{
		Schema::create('banques', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libelle', 150)->nullable();
			$table->decimal('montant')->nullable();
			$table->string('numero_compte', 200)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('banques');
	}
}