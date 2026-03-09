<?php

namespace App\Service\User;

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

    public function createMessage(array $data)
    {
        $data["already_read"] = false;
        $message = Message::create($data);

        return $message;
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
