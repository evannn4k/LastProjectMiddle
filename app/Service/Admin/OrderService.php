<?php

namespace App\Service\Admin;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function destroyOrder($order)
    {
        $order = $order->delete();

        return $order;
    }
}
