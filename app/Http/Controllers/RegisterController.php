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
        if( Auth::check() ) {
            return redirect() 
                -> route('home.all');
        }
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
            return redirect() 
                -> intended(route('home.all'));
        }

        return back() 
            -> withErrors(['error' => 'Email ou mot de passe invalide'])
            -> withInput();
    }


    public function signup_action( Request $request ) {
        $validator = Validator::make( $request -> all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ] );

        $validator -> messages([
            'name.required' => 'Le nom est requis',
            'name.max' => 'Le nom ne doit pas contenir plus de 50 caractères',
            'email.required' => 'L\'email est requis',
            'email.email' => 'L\'email n\'est pas correcte',
            'email.unique' => 'Cette emil est déjà prise',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'password_confirmation.required' => 'Le mot de passe de confirmation est requis',
        ]);

        if( $validator -> fails() ) {
            return back() 
                -> withErrors( $validator ) 
                -> withInput();
        }

        $user = new User();
        $user -> name = $request -> input('name');
        $user -> email = $request -> input('email');
        $user -> password = Hash::make( $request -> input('password') );
        $user -> save();

        return redirect() 
            -> route('register.login');
    }


    public function logout_action( Request $request ) {
        Auth::logout();
        return redirect() 
            -> route('register.login');
    }
}
