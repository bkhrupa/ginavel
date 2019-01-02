<?php

namespace App\Http\Controllers;

use App\Http\Filters\OrderFilter;
use App\Http\Requests\Order\CreateRequest;
use App\Http\Requests\Order\StatusRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param OrderFilter $filter
     * @return \Illuminate\Http\Response
     */
    public function index(OrderFilter $filter)
    {
        $orders = Order::query()
            ->with(['client', 'orderProducts'])
            ->filter($filter)
            ->sortable(['due_date' => 'desc'])
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::query()->get();

        return view('orders.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $orderData = array_merge(
            $request->except(['_token', 'products']),
            ['created_by' => $request->user()->id]
        );

        $order = Order::query()->create($orderData);

        foreach ($request->get('products') as $orderProductData) {
            if ($quantity = $orderProductData['quantity']) {
                $product = Product::query()->find($orderProductData['id']);

                OrderProduct::query()->create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $product->price,
                        'sum' => ($product->price * $quantity),
                    ]
                );
            }
        }

        return redirect(route('order.show', $order->id))
            ->with(['status' => 'Order successful created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = $order->load([
            'creator',
            'client',
            'orderProducts',
            'orderProducts.product' => function($builder) {
                $builder->withTrashed();
            }]);

        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->load('orderProducts');
        $products = Product::query()->get();

        return view('orders.edit', ['order' => $order, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $orderData = array_merge(
            $request->except(['_token', '_method', 'products']),
            ['created_by' => $request->user()->id]
        );

        $order->update($orderData);

        foreach ($request->get('products') as $orderProductData) {
            $product = Product::query()->find($orderProductData['id']);

            if ($quantity = $orderProductData['quantity']) {
                OrderProduct::query()->updateOrCreate([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                ], [
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'sum' => ($product->price * $quantity),
                ]);
            } else {
                OrderProduct::query()
                    ->where([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                    ])
                    ->delete();
            }
        }

        return redirect(route('order.show', $order->id))
            ->with(['status' => 'Order successful updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect(route('order.index'))
            ->with(['status' => 'Order successful deleted.']);
    }

    /**
     * @param \App\Models\Order $order
     * @param StatusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Order $order, StatusRequest $request)
    {
        $order->update($request->only(['status']));

        return redirect(route('order.show', $order->id))
            ->with(['status' => 'Order Status successful updated.']);
    }
}
