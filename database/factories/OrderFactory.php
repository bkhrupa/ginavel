<?php

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    $createdBy = User::query()->inRandomOrder()->first() ?? factory(User::class)->create();
    $client = Client::query()->inRandomOrder()->first() ?? factory(Client::class)->create();

    return [
        'created_by' => $createdBy->id,
        'client_id' => $client->id,
        'due_date' => Carbon::now()->addDays(rand(-5, 5)),
        'status' => array_random(array_keys(Order::$statuses)),
        'note' => $faker->paragraph,
    ];
});
