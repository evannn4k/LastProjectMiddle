<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\VerifyRequest;
use App\Service\AuthService;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function formLoginPage()
    {
        return view('content.auth.login');
    }

    public function verify(VerifyRequest $request) 
    {
        $role = $this->authService->verify($request);
        $request->session()->regenerate();

        if($role == "admin") {
            return redirect()->intended("/admin/dashboard");
        } else if($role == "user") {
            return redirect()->intended("/");
        } else {
            return back()->with("error", "Password atau email salah")->withInput();
        }
    }
    
    public function formRegisterPage()
    {
        return view('content.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request);
        
        return redirect()->intended("/");
    }
    
    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return redirect()->intended("/");
    }

}