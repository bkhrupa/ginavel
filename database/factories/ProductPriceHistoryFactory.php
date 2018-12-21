<?php

use App\Models\Product;
use App\Models\Product\PriceHistory;
use Faker\Generator as Faker;

$factory->define(PriceHistory::class, function (Faker $faker) {
    $product = Product::query()->inRandomOrder()->first() ?? factory(Product::class)->create();

    return [
        'product_id' => $product->id,
        'price' => $product->price,
    ];

});
