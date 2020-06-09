<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\Ingredient;
use Faker\Factory;

class IngredientRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        foreach(range(1, 500) as $index) {
            DB::table('ingredient_recipe')->insert(array(
                'recipe_id' => $faker->randomElement(Recipe::pluck( 'id' )->toArray()),
                'ingredient_id' => $faker->randomElement(Ingredient::pluck( 'id' )->toArray())
            ));
        }
    }
}
