<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->iAmAdmin();
    }

    public function testCreateView()
    {
        $response = $this->get(route('product.create'));

        $response->assertStatus(200);

        $response->assertSeeText(__('form.product_name'));
        $response->assertSeeText(__('form.price'));
        $response->assertSeeText(__('form.description'));
        $response->assertSeeText(__('form.status'));
        $response->assertSeeText(__('form.create'));
        $response->assertSeeText(__('form.cancel'));

        $response->assertViewIs('products.create');
    }
}
