<?php

namespace App\Models\Product;

use App\Models\BaseModel;
use App\Models\Product;

class PriceHistory extends BaseModel
{
    protected $fillable = [
        'product_id',
        'price',
    ];

    protected $casts = [
        'product_id' => 'int',
        'price' => 'int',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
