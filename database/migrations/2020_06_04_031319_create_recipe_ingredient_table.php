<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id')->nullable();
            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->timestamps();

            $table->foreign('recipe_id')
            ->references( 'id' )
            ->on( 'recipes' )
            ->onDelete('cascade');

            $table->foreign('ingredient_id')
            ->references( 'id' )
            ->on( 'ingredients' )
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredient');
    }
}
