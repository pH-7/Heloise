<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'remember_token' => str_random(10),
    ];
});
