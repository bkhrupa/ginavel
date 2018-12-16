<?php

namespace App\Models;

class OrderProduct extends BaseModel
{

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'sum',
    ];

    protected $casts = [
        'quantity' => 'int',
        'price' => 'int',
        'sum' => 'int',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
