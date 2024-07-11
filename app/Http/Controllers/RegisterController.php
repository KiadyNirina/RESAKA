<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function signup_action( Request $request ) {
        $validator = Validator::make( $request -> all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ] );

        if( $validator -> fails() ) {
            return back() -> withErrors( $validator );
        }

        $user = new User();
        $user -> name = $request -> input('name');
        $user -> email = $request -> input('email');
        $user -> password = Hash::make( $request -> input('password') );
        $user -> save();

        return redirect() -> route('register.login');
    }
}
