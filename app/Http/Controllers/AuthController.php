<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login() {
        $data = [
            'title' => 'Login',
            'js' => asset('js/auth/login.js?v' . Str::random(8))
        ];

        return view('auth.login', $data);
    }
}
