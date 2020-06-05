<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use App\Ingredients;
use App\User;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->foodName,
        'user_id' => $faker->randomElement(User::pluck( 'id' )->toArray()),
        'picture' => $faker->imageUrl($width = 400, $height = 400, $category = 'food'),
        'directions' => $faker->paragraph
    ];
});
