<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'password' => bcrypt('parola'),
        'role_id' => mt_rand(2, 3)
    ];
});

$factory->define(App\VideoCategory::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
    ];
});