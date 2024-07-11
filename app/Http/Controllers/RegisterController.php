<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function login() {
        return view('register.login');
    }

    public function signup() {
        return view('register.signup');
    }

    public function login_action( Request $request ) {
        $this -> validate( 
            $request, [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        $query = $request -> only(['email', 'password']);
        if( Auth::attempt($query) ) {
            return redirect() -> intended(route('home.all'));
        }

        return back() -> withErrors(['email' => 'Requête invalide']);
    }
}
