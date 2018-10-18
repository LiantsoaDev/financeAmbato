<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnotherForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //table mouvements
         Schema::table('mouvements', function(Blueprint $table) {
			$table->foreign('debit_id')->references('id')->on('debits')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
         //table mouvements
         Schema::table('mouvements', function(Blueprint $table) {
			$table->foreign('credit_id')->references('id')->on('credits')
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
