<?php

namespace App\Http\Controllers;

use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // TODO write comments and refactor variables names ;)
        $co = [
            [null, 'abs', 'gin'],
            [null, 10.5, 3],
            ['lizard', 5, null],
            ['lizard 2', 0.5, 1],
            ['kum', 5, 2],
        ];

        $ol = Order::query()
            ->whereIn('status', [Order::STATUS_NEW, Order::STATUS_IN_PROGRESS])
            ->with([
                'client',
                'orderProducts',
                'orderProducts.product' => function ($builder) {
                    $builder->withTrashed();
                }
            ])
            ->get();

        $pos = [];

        $ol->each(function ($order) use (&$pos) {
            foreach ($order->orderProducts as $orderProduct) {
                if (!isset($pos[$orderProduct->product->id])) {
                    $pos[$orderProduct->product->id] = [
                        'id' => $orderProduct->product->id,
                        'name' => $orderProduct->product->name,
                        'quantity' => 0,
                    ];
                }
                $pos[$orderProduct->product->id]['quantity'] += $orderProduct->quantity;
            }
        });

        ksort($pos);

        $a = [
            array_merge([null], $pos),
            array_merge([null], collect($pos)->pluck('quantity')->toArray()),
        ];

        foreach ($ol as $order) {

            $fff = [$order];
            foreach ($a[0] as $productId => $productOrderSumData) {
                if ($productId) {
                    $clientOrderQuantity = optional($order->orderProducts->firstWhere('product_id', $productId))->quantity;
                    array_push($fff, $clientOrderQuantity);
                }
            }
            array_push(
                $a,
                $fff
            );
        }

        $co = $a;
//        dd($a);

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
                } else {
                    $productOrdersSum[$orderProduct->product->name] += $orderProduct->quantity;
                }
            }
        });

        return view(
            'home',
            [
                'ordersList' => $ordersList,
                'productOrdersSum' => $productOrdersSum,
                'co' => $co,
            ]
        );
    }
}
