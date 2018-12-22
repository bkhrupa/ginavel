<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
            ->with(['client', 'orderProducts', 'orderProducts.product'])
            ->sortable()
            ->paginate();

        return view('home', ['ordersList' => $ordersList]);
    }
}
