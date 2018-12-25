<?php

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{

    public function run()
    {
        if (!app()->environment('production')) {
            factory(Order::class)
                ->times(16)
                ->create()
                ->each(function ($order) {
                    $order->orderProducts()->saveMany(factory(OrderProduct::class)->times(rand(1, 3))->make());
                });
        }
    }
}
