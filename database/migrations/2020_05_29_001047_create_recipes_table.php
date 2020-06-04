<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('picture');
            $table->string('directions');
            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->timestamps();
            /** 
             *   $table->foreign( 'ingredient_id' )
             *  ->references( 'id' )
             *  ->on( 'ingredients' )
             * ->onDelete( 'cascade' );*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
