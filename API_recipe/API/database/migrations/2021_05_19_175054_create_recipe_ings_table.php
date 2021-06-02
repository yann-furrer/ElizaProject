<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ings', function (Blueprint $table) {
            $table->integer('id_recipe')->unsigned();
            $table->integer('id_ingredient')->unsigned();
            $table->foreign('id_recipe')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('id_ingredient')->references('id')->on('ingredient_recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ings');
    }
}
