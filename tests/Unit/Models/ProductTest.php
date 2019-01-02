<?php

namespace Tests\Unit\Models;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product as ProductModel;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testEventCreated()
    {
        $data = [
            'name' => 'Foo',
            'price' => 114,
            'description' => 'Foo description',
            'status' => ProductModel::STATUS_ENABLED,
        ];

        ProductModel::query()->create($data);

        $this->assertDatabaseHas('products', $data);
        $this->assertDatabaseHas('price_histories', ['price' => 114]);
    }

    public function testEventUpdated()
    {
        $this->seed();

        /** @var ProductModel $product */
        $product = ProductModel::query()->first();
        $priceHistoriesCount = $product->priceHistories()->count();
        $product->price = 213;
        $product->save();
        $product->refresh();

        $this->assertDatabaseHas('price_histories', ['price' => 213]);
        $this->assertEquals(($priceHistoriesCount + 1), $product->priceHistories()->count());

        $product = ProductModel::query()->first();
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
            'status' => ProductModel::STATUS_ENABLED,
        ];

        ProductModel::query()->create($data);

        /** @var ProductModel $product */
        $product = ProductModel::query()->first();

        $this->assertInternalType('int', $product->id);
        $this->assertInternalType('int', $product->price);
        $this->instance(Carbon::class, $product->created_at);
        $this->instance(Carbon::class, $product->updated_at);
    }
}
