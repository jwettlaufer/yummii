<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'bio' => $faker->paragraph,
        'user_id' => $faker->unique()->randomElement(User::pluck( 'id' )->toArray()),
    ];
});
