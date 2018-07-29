<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'title' => $faker->word,
        'body' => $faker->paragraph
    ];
});
