<?php

namespace Tests\Unit\Models;

use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderProductTest extends TestCase
{
    use RefreshDatabase;

    public function testQuantityDecimal()
    {
        $orderProduct = factory(OrderProduct::class)->create(['quantity' => 1.25]);

        $this->assertDatabaseHas('order_products', $orderProduct->toArray());
    }

    public function testCast()
    {
        $orderProduct = factory(OrderProduct::class)->create([
            'quantity' => '1.25',
            'price' => '125',
            'sum' => '251',
        ]);

        $this->assertIsInt($orderProduct->id);
        $this->assertIsFloat($orderProduct->quantity);
        $this->assertIsInt($orderProduct->price);
        $this->assertIsInt($orderProduct->sum);
        $this->instance(Carbon::class, $orderProduct->created_at);
        $this->instance(Carbon::class, $orderProduct->updated_at);
    }
}
