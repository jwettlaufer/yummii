<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\User;
use App\Ingredient;
use Faker\Factory;

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
        $faker = Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        foreach(range(1, 25) as $index){
            DB::table('recipes')->insert(array(
                'title' => $faker->foodName,
                'user_id' => $faker->randomElement(User::pluck( 'id' )->toArray()),
                'picture' => $faker->imageUrl($width = 400, $height = 400, $category = 'food'),
                'directions' => $faker->paragraph
            ));
            }
    }
}
