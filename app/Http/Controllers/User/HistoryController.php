<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function history()
    {
        if (Auth::guard("user")->check()) {
            $orders = Order::where('user_id', Auth::guard('user')->user()->id)->get();
        } else {
            abort(404);
        }

        return view("content.user.history.history", compact("orders"));
    }

    public function detail(Order $order)
    {
        return view("content.user.history.detail", compact("order"));
    }
}
