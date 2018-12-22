<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function products()
    {
        $products = Product::enabled()
            ->sortable()
            ->paginate();

        return view('pages.products', ['products' => $products]);
    }
}
