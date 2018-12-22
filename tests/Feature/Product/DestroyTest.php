<?php

namespace Tests\Feature\Product;

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
        // TODO @test
        $response = $this->delete(route('product.destroy', 1));

        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }
}
