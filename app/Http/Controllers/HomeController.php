<?php

namespace App\Http\Controllers;

use App\Models\Order;
use function PHPSTORM_META\elementType;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordersList = Order::query()
            ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS])
            ->with([
                'client',
                'orderProducts',
                'orderProducts.product' => function ($builder) {
                    $builder->withTrashed();
                }
            ])
            ->sortable()
            ->paginate();

        $productOrdersSum = [];

        $ordersList->each(function ($order) use (&$productOrdersSum) {
            foreach ($order->orderProducts as $orderProduct) {
                if (!isset($productOrdersSum[$orderProduct->product->name])) {
                    $productOrdersSum[$orderProduct->product->name] = $orderProduct->quantity;
                }
                else {
                    $productOrdersSum[$orderProduct->product->name] += $orderProduct->quantity;
                }
            }
        });

        return view('home', ['ordersList' => $ordersList, 'productOrdersSum' => $productOrdersSum]);
    }
}
