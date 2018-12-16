<?php

use App\Models\Order;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(App\Models\OrderProduct::class, function (Faker $faker) {
    $order = Order::query()->inRandomOrder()->first() ?? factory(Order::class)->create();
    $product = Product::query()->inRandomOrder()->first() ?? factory(Product::class)->create();
    $quantity = rand(1, 3);

    return [
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => $quantity,
        'price' => $product->price,
        'sum' => $product->price * $quantity,
    ];
});
