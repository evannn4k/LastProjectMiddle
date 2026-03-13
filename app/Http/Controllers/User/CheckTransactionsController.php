<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckTransactionsController extends Controller
{
    public function transaction()
    {
        $orders = Order::with(["product.game", "product.category"])->limit(10)->get();

        return view("content.user.transaction.check", compact("orders"));
    }

    public function detail(Request $request)
    {
        $request->validate([
            "invoice_number" => "required"
        ]);

        $order = Order::where("invoice_number", $request->invoice_number)->first();
     
        if($order) {
            return view("content.user.transaction.detail", compact("order"));
        } else {
            return back()->with("error", "Transaksi tidak ditemukan");
        }
    }
}
