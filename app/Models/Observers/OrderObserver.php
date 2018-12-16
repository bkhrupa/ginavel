<?php

namespace App\Models\Observers;

use App\Models\Order;

class OrderObserver {

    /**
     * @param Order $order
     * @throws \Exception
     */
    public function deleting(Order $order)
    {
        foreach ($order->orderProducts as $orderProduct) {
            /** @var  \App\Models\OrderProduct $orderProduct */
            $orderProduct->delete();
        }
    }
}
