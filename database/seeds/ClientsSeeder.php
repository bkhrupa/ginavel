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
        $clients = [
            [
                'name' => 'Богдан Хрупа',
                'phone' => '+380630000001'
            ],
        ];

        foreach ($clients as $client) {
            Client::query()->firstOrCreate($client);
        }

        if (!app()->environment('production')) {
            factory(Client::class)->times(20)->create();
        }
    }
}
