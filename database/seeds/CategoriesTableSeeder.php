<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\Category;
use Faker\Factory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(array(
            array(
              'category' => 'Breakfast',
            ),
            array(

              'category' => 'Lunch',
            ),
            array(

                'category' => 'Dinner',
            ),
            array(

                'category' => 'Dessert',
              )
          ));   
    }
}
