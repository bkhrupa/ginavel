<?php

namespace Tests\Feature\Product;

use App\Models\Product;
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

    public function testSuccessfulCreate()
    {
        $data = [
            'name' => 'Foo',
            'price' => 113,
            'description' => 'Foo description',
            'status' => Product::STATUS_ENABLED,
        ];

        $response = $this->post(route('product.store', $data));

        $response->assertStatus(302);
        $response->assertSessionHas('status');
        $this->assertDatabaseHas('products', $data);
        $this->assertDatabaseHas('price_histories', ['price' => 113]);
    }

    public function testRequestErrors()
    {
        $this->seed();

        $d = [
            [
                'data' => [],
                'errors' => [
                    'name' => 'The name field is required.',
                    'price' => 'The price field is required.',
                    'status' => 'The status field is required.',
                ],
            ],
            [
                'data' => [
                    'name' => 'Absinthe',
                ],
                'errors' => [
                    'name' => 'The name has already been taken.',
                ],
            ],
            [
                'data' => [
                    'name' => str_repeat('foo_bar', 34),
                    'price' => 'foo_bar',
                    'description' => str_repeat('foo_bar', 1000),
                    'status' => 'foo'
                ],
                'errors' => [
                    'name' => 'The name may not be greater than 191 characters.',
                    'price' => 'The price must be an integer.',
                    'description' => 'The description may not be greater than 2048 characters.',
                    'status' => 'The selected status is invalid.',
                ],
            ],
        ];

        foreach ($d as $data) {
            $response = $this->post(route('product.store', $data['data']));

            foreach ($data['errors'] as $errorKey => $errorMsg) {
                $response->assertSessionHasErrors($errorKey);

                if ($errorMsg) {
                    /** @var \Illuminate\Support\MessageBag $messageBug */
                    $messageBug = app('session.store')->get('errors')->getBag('default');

                    $this->assertEquals($errorMsg, $messageBug->first($errorKey));
                }
            }
        }
    }
}
