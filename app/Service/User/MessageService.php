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
}
