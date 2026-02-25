<?php

namespace App\Service\Admin;

use App\Models\User;

class UserService
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
        $user = User::create($data);

        return $user;
    }

    public function updateUser($user, array $data)
    {
        if(!isset($data["password"])) {
            unset($data["password"]);
        }

        $user->update($data);

        return $user;
    }

    public function deleteUser($user)
    {
        $user->delete();

        return $user;
    }
}
