<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function forgot(): View
    {
        return view('auth.forgot');
    }

    public function reset(): View
    {
        return view('auth.reset');
    }
}
