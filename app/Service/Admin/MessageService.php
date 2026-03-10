<?php

namespace App\Service\Admin;

use App\Models\Message;

class MessageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function readMessage($message)
    {
        $message->already_read = true;
        $message->save();

        return $message;
    }

    public function readAllMessage()
    {
        $message = Message::where("already_read", false)->update(["already_read" => true]);

        return $message;
    }
}
