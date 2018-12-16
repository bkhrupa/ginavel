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
                'name' => 'Подарункова тара',
                'price' => 10,
                'description' => 'Ціна за одиницію тари',
            ],
            [
                'name' => 'Absinthe',
                'price' => 250,
                'description' => '72 градуси',
            ],
            [
                'name' => 'Gin',
                'price' => 220,
                'description' => null,
            ],
            [
                'name' => 'Becher',
                'price' => 160,
                'description' => null,
            ],[
                'name' => 'Мятний спотикач',
                'price' => 160,
                'description' => '45 градусів',
            ],[
                'name' => 'Хренівка *',
                'price' => 160,
                'description' => null,
            ],[
                'name' => 'Rum',
                'price' => 250,
                'description' => '40 градусів',
            ],[
                'name' => 'Spirit',
                'price' => 95,
                'description' => null,
                'status' => Product::STATUS_DISABLE

            ],
        ];

        foreach ($products as $product) {
            Product::query()->firstOrCreate($product);

        }
    }
}
