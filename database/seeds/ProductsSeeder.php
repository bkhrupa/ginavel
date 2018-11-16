<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Absinthe',
                'price' => 250,
                'description' => null,
            ],
            [
                'name' => 'Gin',
                'price' => 180,
                'description' => null,
            ],
        ];

        foreach ($products as $product) {
            factory(Product::class)->create($product);

        }

        factory(Product::class)->times(30)->create();
    }
}
