<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        (new UsersTableSeeder)->run();

        (new ProfilesTableSeeder)->run();

        (new RecipesTableSeeder)->run();

        (new IngredientsTableSeeder)->run();
        
        (new IngredientRecipeTableSeeder)->run();

        (new CategoriesTableSeeder)->run();

        (new CategoryRecipeTableSeeder)->run();
    }
}
