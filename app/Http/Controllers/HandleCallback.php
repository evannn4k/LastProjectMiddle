<?php

namespace App\Http\Controllers;

use App\Service\HandleCallbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HandleCallback extends Controller
{
    protected $handleCallbackService;

    public function __construct(HandleCallbackService $handleCallbackService)
    {
        $this->handleCallbackService = $handleCallbackService;
    }

    public function callback(Request $request)
    {
        $this->handleCallbackService->handleCallback($request);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
