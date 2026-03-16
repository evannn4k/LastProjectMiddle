<?php

namespace App\Service\User;

use Illuminate\Support\Facades\Auth;

class ProfileService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function updateUser($user, array $data)
    {
        if (!isset($data["password"])) {
            unset($data["password"]);
        }

        $user->update($data);

        return $user;
    }

    public function deleteUser($user, $request)
    {
        $user->delete();

        Auth::guard("user")->logout();
        $request->session()->invalidate();

        return $user;
    }
}
