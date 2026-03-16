<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $amountTransaction = Order::sum('final_price');
        $totalTransaction = Order::count();
        $totalTransactionToday = Order::whereDate('created_at', today())->count();
        $totalTransactionThisMonth = Order::whereMonth('created_at', now()->month)->count();

        $orders = Order::with(["product.game", "product.category"])->limit(10)->get();

        return view('content.admin.dashboard', compact('orders', 'amountTransaction', 'totalTransaction', 'totalTransactionToday', 'totalTransactionThisMonth'));
    }
}
