<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testEventCreated()
    {
        $data = [
            'name' => 'Foo',
            'price' => 114,
            'description' => 'Foo description',
            'status' => Product::STATUS_ENABLED,
        ];

        Product::query()->create($data);

        $this->assertDatabaseHas('products', $data);
        $this->assertDatabaseHas('price_histories', ['price' => 114]);
    }

    public function testEventUpdated()
    {
        $this->seed();

        /** @var Product $product */
        $product = Product::query()->first();
        $priceHistoriesCount = $product->priceHistories()->count();
        $product->price = 213;
        $product->save();
        $product->refresh();

        $this->assertDatabaseHas('price_histories', ['price' => 213]);
        $this->assertEquals(($priceHistoriesCount + 1), $product->priceHistories()->count());

        $product = Product::query()->first();
        $priceHistoriesCount = $product->priceHistories()->count();
        $product->name = 'foo';
        $product->save();
        $product->refresh();

        $this->assertEquals($priceHistoriesCount, $product->priceHistories()->count());

    }

    public function testCast()
    {
        $data = [
            'name' => 'Foo',
            'price' => '114',
            'description' => 'Foo description',
            'status' => Product::STATUS_ENABLED,
        ];

        Product::query()->create($data);

        /** @var Product $product */
        $product = Product::query()->first();

        $this->assertIsInt($product->id);
        $this->assertIsInt($product->price);
        $this->instance(Carbon::class, $product->created_at);
        $this->instance(Carbon::class, $product->updated_at);
    }
}
