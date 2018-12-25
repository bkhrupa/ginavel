<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->seed();
        $this->iAmAdmin();
    }

    public function testSuccessfulDelete()
    {
        /** @var Product $product */
        $product = Product::query()->first();

        $response = $this->delete(route('product.destroy', $product->id));

        $product->refresh();

        $response->assertStatus(302);
        $response->assertSessionHas('status');
        $this->assertDatabaseHas('products', $product->toArray());
        $this->assertNotNull($product->deleted_at);
    }
}
