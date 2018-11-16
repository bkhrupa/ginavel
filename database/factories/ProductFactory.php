<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {

    return [
        'name' => $faker->firstName,
        'price' => array_random(range(100, 500, 20)),
        'description' => $faker->paragraph,
    ];
});
