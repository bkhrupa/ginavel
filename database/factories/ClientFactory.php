<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->e164PhoneNumber,
        'note' => $faker->paragraph,
    ];
});
