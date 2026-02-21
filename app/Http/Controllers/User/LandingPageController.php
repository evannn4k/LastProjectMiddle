<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('content.user.index');
    }
}
