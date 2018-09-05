<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('caisses', function(Blueprint $table) {
			$table->foreign('entite_id')->references('id')->on('entites')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('caisses', function(Blueprint $table) {
			$table->foreign('banque_id')->references('id')->on('banques')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
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
		Schema::table('realisations', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('annees', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('credits', function(Blueprint $table) {
			$table->foreign('mouvement_id')->references('id')->on('mouvements')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('credits', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('debits', function(Blueprint $table) {
			$table->foreign('mouvement_id')->references('id')->on('mouvements')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('debits', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('budget_compte', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('budget_compte', function(Blueprint $table) {
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('caisses', function(Blueprint $table) {
			$table->dropForeign('caisses_entite_id_foreign');
		});
		Schema::table('caisses', function(Blueprint $table) {
			$table->dropForeign('caisses_banque_id_foreign');
		});
		Schema::table('budgets', function(Blueprint $table) {
			$table->dropForeign('budgets_realisation_id_foreign');
		});
		Schema::table('budgets', function(Blueprint $table) {
			$table->dropForeign('budgets_entite_id_foreign');
		});
		Schema::table('budgets', function(Blueprint $table) {
			$table->dropForeign('budgets_annee_id_foreign');
		});
		Schema::table('realisations', function(Blueprint $table) {
			$table->dropForeign('realisations_budget_id_foreign');
		});
		Schema::table('annees', function(Blueprint $table) {
			$table->dropForeign('annees_budget_id_foreign');
		});
		Schema::table('credits', function(Blueprint $table) {
			$table->dropForeign('credits_mouvement_id_foreign');
		});
		Schema::table('credits', function(Blueprint $table) {
			$table->dropForeign('credits_compte_id_foreign');
		});
		Schema::table('debits', function(Blueprint $table) {
			$table->dropForeign('debits_mouvement_id_foreign');
		});
		Schema::table('debits', function(Blueprint $table) {
			$table->dropForeign('debits_compte_id_foreign');
		});
		Schema::table('budget_compte', function(Blueprint $table) {
			$table->dropForeign('budget_compte_budget_id_foreign');
		});
		Schema::table('budget_compte', function(Blueprint $table) {
			$table->dropForeign('budget_compte_compte_id_foreign');
		});
	}
}