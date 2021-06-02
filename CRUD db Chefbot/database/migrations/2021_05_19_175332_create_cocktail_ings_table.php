<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocktailIngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocktail_ings', function (Blueprint $table) {
            $table->integer('id_cocktail')->unsigned();
            $table->integer('id_ingredient')->unsigned();
            $table->foreign('id_cocktail')->references('id')->on('cocktails')->onDelete('cascade');
            $table->foreign('id_ingredient')->references('id')->on('ingredient_cocktails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cocktail_ings');
    }
}
