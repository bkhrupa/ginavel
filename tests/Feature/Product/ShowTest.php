<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->seed();
        $this->iAmAdmin();
    }

    public function testShow()
    {
        $product = Product::query()->find(2);

        $response = $this->get(route('product.show', $product->id));

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertSeeText('Absinthe');
        $response->assertSeeText('250');
        $response->assertSeeText('Prices History');
    }

    public function test404()
    {
        $response = $this->get(route('product.show', 404));

        $response->assertStatus(404);
        $response->assertSeeText('could not be found.');
    }
}
