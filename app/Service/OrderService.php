<?php

namespace App\Service;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function create(array $data)
    {
        $product = Product::findOrFail($data["product_id"]);
        $nameProduct = $product->name ?? $product->amount . $product->category->name;

        $invoice_number = 'INV-' . time() . rand(100, 999);
        $title = $nameProduct . " " . $product->game->name . " " . $invoice_number;
        $finalPrice = $product->price * $data["quantity"];

        $secret_key = "Basic " . base64_encode("JDJ5JDEzJHdISW81M1lEYmIySmtDQTVjSmZmdWUzOTlhUnV5NXhpcTJNYzhXM2Rob3Q0bElYblBBMkpT" . ":");

        $payload = json_encode([
            "title" => $title,
            "type" => "SINGLE",
            "amount" => $finalPrice,
            "expired_date" => now()->addDays(1)->format('Y-m-d H:i'),
            "reference_id" => $invoice_number,
            "sender_phone_number" => $data["no"] ?? "-"
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://bigflip.id/big_sandbox_api/v2/pwf/bill',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Accept: application/json",
                "Authorization: $secret_key"
            ),
        ));

        $response = curl_exec($curl);

        $bill = json_decode($response);
        curl_close($curl);

        $data["id_bill"] = $bill->link_id;
        $data["title"] = $title;
        $data["link_url"] = $bill->link_url;
        $data["user_id"] = Auth::guard("user")->user()->id ?? null;
        $data["invoice_number"] = $invoice_number;
        $data["amount"] = $product->amount . " " . $product->category->name;
        $data["status"] = "pending";
        $data["final_price"] = $finalPrice;

        Order::create($data);

        $url = "https://" . $bill->link_url;

        return $url;
    }

    public function notification($request)
    {
        $response = $request->data;
        $data = json_decode($response); 

        $order = Order::where("id_bill", $data->bill_link_id)->first();

        if ($order && $order->status == "pending") {
            $order->status = strtolower($data->status);
            $order->save();
        }
    }
}
