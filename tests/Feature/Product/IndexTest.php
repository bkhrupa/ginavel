<?php

namespace Tests\Feature\Product;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase {

    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->seed();
        $this->iAmAdmin();
    }

    public function testStatus200()
    {
        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    public function testProductsList()
    {
        $response = $this->get('/product');

        $response->assertSeeText(__('product.new_product'));
        $response->assertSeeText('Absinthe');
        $response->assertViewIs('products.index');
    }
}
