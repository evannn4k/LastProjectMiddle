<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Service\Admin\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index()
    {
        $messages = Message::all();
        $notification = Message::where("already_read", false)->count();

        return view("content.admin.message.index", compact("messages", "notification"));
    }

    public function read(Message $message)
    {
        $message = $this->messageService->readMessage($message);

        if ($message) {
            return redirect()->route('admin.message.index')->with('success', 'Berhasil mengubah status pesan');
        } else {
            return redirect()->route('admin.message.index')->with('error', 'Gagal mengubah status pesan');
        }
    }

    public function readAll()
    {
        $message = $this->messageService->readAllMessage();

        if ($message) {
            return redirect()->route('admin.message.index')->with('success', 'Berhasil mengubah status pesan');
        } else {
            return redirect()->route('admin.message.index')->with('error', 'Gagal mengubah status pesan');
        }
    }
}
