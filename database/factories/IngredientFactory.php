<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use App\Ingredient;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {
    return [
        //
        'ingredient' => $faker->ingredient
    ];
});
