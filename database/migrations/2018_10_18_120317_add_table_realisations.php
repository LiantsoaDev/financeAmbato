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
            $table->unsignedInteger('compte_id');
            $table->unsignedInteger('budget_id');
            $table->decimal('total',20,2)->nullable();
            $table->timestamps();

            $table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
                        ->onUpdate('restrict');
                        
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
        Schema::dropIfExists('realisations');
    }
}
