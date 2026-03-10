<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\Admin\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = Order::with(["product.game"])->get();

        return view("content.admin.order.index", compact("orders"));
    }

    public function show($id)
    {
        $order = Order::with(["product.game", "user"])->findOrFail($id);

        return view("content.admin.order.detail", compact("order"));
    }

    public function destroy(Order $order) 
    {
        $order = $this->orderService->destroyOrder($order);

        if($order) {
            return redirect()->back()->with('success', 'Berhasil menghapus data pesanan');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data pesanan');
        }
    }
}
