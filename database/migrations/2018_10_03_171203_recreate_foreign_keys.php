<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('realisation_id')->references('id')->on('realisations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('entite_id')->references('id')->on('entites')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('annee_id')->references('id')->on('annees')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
