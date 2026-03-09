<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\MessageRequest;
use App\Service\User\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function message()
    {
        return view("content.user.message");
    }

    public function store(MessageRequest $request)
    {
        $message = $this->messageService->createMessage($request->validated());

        if ($message) {
            return redirect()->route('message')->with('success', 'Berhasil mengirim pesan');
        } else {
            return redirect()->route('message')->with('error', 'Gagal mengirim pesan');
        }
    }
}
