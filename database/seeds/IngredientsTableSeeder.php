<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\Ingredient;
use Faker\Factory;

class IngredientsTableSeeder extends Seeder
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
        $faker->addProvider(new \Bezhanov\Faker\Provider\Food($faker));
        foreach(range(1, 100) as $index){
            DB::table('ingredients')->insert(array(
                'ingredient' => $faker->ingredient
            ));
        }
    }
}
