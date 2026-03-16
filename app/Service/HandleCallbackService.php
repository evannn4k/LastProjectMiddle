<?php

namespace App\Service;

use App\Models\Order;
use App\Models\Subscription;

class HandleCallbackService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function handleCallback($request)
    {
        $response = $request->data;
        $data = json_decode($response);

        $order = Order::where("id_bill", $data->bill_link_id)->first();

        if ($order && $order->status == "pending") {
            $order->status = strtolower($data->status);
            $order->save();
        }

        $subscription = Subscription::where("id_bill", $data->bill_link_id)->first();

        if ($subscription && $subscription->status == "pending") {
            $subscription->status = strtolower($data->status);
            $subscription->save();
        }
    }
}
