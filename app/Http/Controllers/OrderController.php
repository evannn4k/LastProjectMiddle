<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\OrderRequest;
use App\Models\Order;
use App\Service\User\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(OrderRequest $request)
    {
        $url = $this->orderService->create($request->validated());

        if ($url) {
            return redirect()->away($url);
        }
    }

    public function notification(Request $request)
    {
        $this->orderService->notification($request);
    }
}
