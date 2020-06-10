<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\Category;
use Faker\Factory;

class CategoryRecipeTableSeeder extends Seeder
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
        foreach(range(1, 50) as $index) {
            DB::table('category_recipe')->insert(array(
                'recipe_id' => $faker->unique()->randomElement(Recipe::pluck( 'id' )->toArray()),
                'category_id' => $faker->randomElement(Category::pluck( 'id' )->toArray())
            ));
        }
    }
}
