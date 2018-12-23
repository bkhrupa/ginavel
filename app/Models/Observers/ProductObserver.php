<?php

namespace App\Models\Observers;

use App\Models\Product;
use App\Models\Product\PriceHistory;

class ProductObserver
{

    /**
     * @param Product $product
     */
    public function created(Product $product)
    {
        PriceHistory::query()->create([
            'product_id' => $product->id,
            'price' => $product->price,
        ]);
    }

    /**
     * @param Product $product
     */
    public function updated(Product $product)
    {
        if ($product->isDirty('price')) {
            PriceHistory::query()->create([
                'product_id' => $product->id,
                'price' => $product->price,
            ]);
        }
    }
}
