<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function verify($request)
    {
        $data = $request->validated();
        $role = null;

        if(Auth::guard("admin")->attempt(["email" => $data["email"], "password" => $data["password"], "role" => "admin"])) {
            $request->session()->regenerate();
            $role = "admin";
        } if(Auth::guard("user")->attempt(["email" => $data["email"], "password" => $data["password"], "role" => "user"])) {
            $request->session()->regenerate();
            $role = "user";
        } 

        return $role;
    }

    public function register($request)
    {
        $data = $request->validated();

        $user = User::create($data);
        if($user) {
            Auth::guard("user")->login($user);
        }
    }

    public function logout($request)
    {
        if(Auth::guard("admin")->check()) {
            Auth::guard("admin")->logout();
        } else if(Auth::guard("user")->check()) {
            Auth::guard("user")->logout();
        }

        $request->session()->invalidate();
    }
}
