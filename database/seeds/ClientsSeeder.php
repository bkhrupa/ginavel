<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
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
                'name' => 'Богдан Хрупа',
                'phone' => '+380630000001'
            ],
        ];

        foreach ($products as $product) {
            factory(Client::class)->create($product);

        }

        factory(Client::class)->times(20)->create();
    }
}
