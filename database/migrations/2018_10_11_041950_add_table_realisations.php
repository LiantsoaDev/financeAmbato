<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableRealisations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('budget_id');
            $table->unsignedInteger('annee_id');
            $table->unsignedInteger('compte_id');
            $table->decimal('total')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->foreign('annee_id')->references('id')->on('annees');
            $table->foreign('compte_id')->references('id')->on('comptes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisations');
    }
}
