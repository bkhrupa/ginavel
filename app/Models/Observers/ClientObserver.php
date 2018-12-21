<?php

namespace App\Models\Observers;

use App\Models\Client;
use App\Models\Order;

class ClientObserver {

    /**
     * @param Client $client
     */
    public function deleting(Client $client)
    {
        $client->orders->each(function (Order $order) {
            $order->delete();
        });
    }
}
