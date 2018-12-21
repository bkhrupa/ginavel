<?php

use App\Models\Product;
use App\Models\Product\PriceHistory;
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
                'price_histories' => [
                    ['price' => 10, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20',]
                ]
            ],
            [
                'name' => 'Absinthe',
                'price' => 250,
                'description' => '72 градуси',
                'price_histories' => [
                    ['price' => 200, 'updated_at' => '2012-01-01', 'created_at' => '2012-01-01'],
                    ['price' => 220, 'updated_at' => '2014-09-16', 'created_at' => '2014-09-16'],
                    ['price' => 250, 'updated_at' => '2015-02-17', 'created_at' => '2015-02-17'],
                    ['price' => 250, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                ]
            ],
            [
                'name' => 'Gin',
                'price' => 220,
                'description' => null,
                'price_histories' => [
                    ['price' => 100, 'updated_at' => '2012-01-01', 'created_at' => '2012-01-01'],
                    ['price' => 120, 'updated_at' => '2014-05-12', 'created_at' => '2014-05-12'],
                    ['price' => 150, 'updated_at' => '2015-02-17', 'created_at' => '2015-02-17'],
                    ['price' => 170, 'updated_at' => '2015-07-15', 'created_at' => '2015-07-15'],
                    ['price' => 180, 'updated_at' => '2017-06-14', 'created_at' => '2017-06-14'],
                    ['price' => 200, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                    ['price' => 220, 'updated_at' => '2018-10-05', 'created_at' => '2018-10-05'],
                ],
            ],
            [
                'name' => 'Becher',
                'price' => 160,
                'description' => null,
                'price_histories' => [
                    ['price' => 100, 'updated_at' => '2012-01-01', 'created_at' => '2012-01-01'],
                    ['price' => 110, 'updated_at' => '2014-05-30', 'created_at' => '2014-05-30'],
                    ['price' => 120, 'updated_at' => '2015-02-17', 'created_at' => '2015-02-17'],
                    ['price' => 130, 'updated_at' => '2015-07-26', 'created_at' => '2015-07-26'],
                    ['price' => 140, 'updated_at' => '2017-06-14', 'created_at' => '2017-06-14'],
                    ['price' => 150, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                    ['price' => 160, 'updated_at' => '2018-10-05', 'created_at' => '2018-10-05'],
                ],
            ], [
                'name' => 'Мятний спотикач',
                'price' => 160,
                'description' => '45 градусів',
                'price_histories' => [
                    ['price' => 130, 'updated_at' => '2016-09-28', 'created_at' => '2016-09-28'],
                    ['price' => 140, 'updated_at' => '2017-06-14', 'created_at' => '2017-06-14'],
                    ['price' => 150, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                    ['price' => 160, 'updated_at' => '2018-10-05', 'created_at' => '2018-10-05'],
                ],
            ], [
                'name' => 'Хренівка *',
                'price' => 160,
                'description' => null,
                'price_histories' => [
                    ['price' => 50, 'updated_at' => '2012-01-01', 'created_at' => '2012-01-01'],
                    ['price' => 65, 'updated_at' => '2014-12-11', 'created_at' => '2014-12-11'],
                    ['price' => 80, 'updated_at' => '2015-02-17', 'created_at' => '2015-02-17'],
                    ['price' => 140, 'updated_at' => '2017-06-14', 'created_at' => '2017-06-14'],
                    ['price' => 150, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                    ['price' => 160, 'updated_at' => '2018-10-05', 'created_at' => '2018-10-05'],
                ],
            ], [
                'name' => 'Rum',
                'price' => 250,
                'description' => '40 градусів',
                'price_histories' => [
                    ['price' => 200, 'updated_at' => '2017-01-12', 'created_at' => '2017-01-12'],
                    ['price' => 220, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                    ['price' => 250, 'updated_at' => '2018-10-05', 'created_at' => '2018-10-05'],
                ],

            ], [
                'name' => 'Spirit',
                'price' => 95,
                'description' => null,
                'status' => Product::STATUS_DISABLE,
                'price_histories' => [
                    ['price' => 48, 'updated_at' => '2012-01-01', 'created_at' => '2012-01-01'],
                    ['price' => 68, 'updated_at' => '2014-12-11', 'created_at' => '2014-12-11'],
                    ['price' => 75, 'updated_at' => '2015-02-17', 'created_at' => '2015-02-17'],
                    ['price' => 85, 'updated_at' => '2015-10-23', 'created_at' => '2015-10-23'],
                    ['price' => 95, 'updated_at' => '2018-03-20', 'created_at' => '2018-03-20'],
                ],
            ],
        ];

        foreach ($products as $product) {

            $newProduct = Product::query()->firstOrCreate([
                'name' => array_get($product, 'name'),
                'price' => array_get($product, 'price'),
                'description' => array_get($product, 'description'),
                'status' => array_get($product, 'status', Product::STATUS_ENABLED),
            ]);

            if ($newProduct->wasRecentlyCreated) {
                if ($priceHistories = array_get($product, 'price_histories')) {
                    foreach ($priceHistories as $priceHistory) {
                        $priceHistory['product_id'] = $newProduct->id;

                        PriceHistory::query()->create($priceHistory);
                    }
                }
            }
        }
    }
}
