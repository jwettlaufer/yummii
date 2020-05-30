<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $recipe_api = file_get_contents( 'https://www.themealdb.com/api/json/v1/1/' ); 

       $recipe_api = json_decode($recipe_api);


    }
}
