<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $category = ['Breakfast', 'Lunch', 'Dinner', 'Dessert', 'Side', 'Soup'];
    return [
        //
        'category' => $category
    ];
});
