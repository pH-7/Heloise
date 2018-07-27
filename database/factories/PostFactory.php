<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(App\Models\User::class)->creat()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
