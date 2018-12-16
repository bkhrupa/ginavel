<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase {

    use RefreshDatabase;

    public function testStatus200()
    {
        $this->seed();

        $this->actingAs(User::query()->findOrFail(1));
        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    public function testProductsList()
    {
        $this->seed();

        $this->actingAs(User::query()->findOrFail(1));
        $response = $this->get('/product');

        $response->assertSeeText('New Product');
        $response->assertSeeText('Absinthe');
        $response->assertViewIs('products.index');
    }
}
