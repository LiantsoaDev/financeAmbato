<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table users
        Schema::table('users', function(Blueprint $table) {
			$table->foreign('entite_id')->references('id')->on('entites')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        //table budgets
        Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('mouvement_id')->references('id')->on('mouvements')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('annee_id')->references('id')->on('annees')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('entite_id')->references('id')->on('entites')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        Schema::table('budgets', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        //table mouvements
        Schema::table('mouvements', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        Schema::table('mouvements', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
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
