<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderProduct extends TestCase
{
    use RefreshDatabase;

    public function testQuantityDecimal()
    {
        $orderProduct = factory(OrderProduct::class)->create(['quantity' => 1.25]);

        $this->assertDatabaseHas('order_products', $orderProduct);
    }
}
