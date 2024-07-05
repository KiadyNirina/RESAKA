<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function login() {
        return view('register.login');
    }

    public function signup() {
        return view('register.signup');
    }
}
