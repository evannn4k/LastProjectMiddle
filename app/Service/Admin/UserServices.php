<?php

namespace App\Service\Admin;

use App\Models\User;

class UserServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createUser(array $data)
    {
        User::create($data);
    }

    public function updateUser($user, array $data)
    {
        if(!isset($data["password"])) {
            unset($data["password"]);
        }

        $user->update($data);
    }

    public function deleteUser($user)
    {
        $user->delete();
    }
}
