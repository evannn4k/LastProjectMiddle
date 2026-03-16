<?php

namespace App\Service\User;

use App\Models\Membership;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class MembershipService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function buyMembership(array $data)
    {
        $membership = Membership::findOrFail($data["membership_id"]);

        $invoice_number = 'INV-SUB-' . time() . rand(100, 999);
        $secret_key = "Basic " . base64_encode(config('services.flip.secret') . ":");

        $payload = json_encode([
            "title" => $membership->name,
            "type" => "SINGLE",
            "amount" => $membership->price,
            "expired_date" => now()->addDays(1)->format('Y-m-d H:i'),
            "reference_id" => $invoice_number,
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('services.flip.base_url'),
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
        $data["invoice_number"] = $invoice_number;
        $data["link_url"] = $bill->link_url;
        $data["user_id"] = Auth::guard("user")->user()->id;
        $data["membership_id"] = $membership->id;
        $data["start_date"] = now();
        $data["end_date"] = now()->addDays($membership->duration);

        Subscription::create($data);

        $url = "https://" . $bill->link_url;

        return $url;
    }
}
