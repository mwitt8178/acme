<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        return view('auth.login');
    }

    public function authenticate(Requests\LoginRequest $request){
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect()->intended('/dashboard');


        return redirect('/')->withErrors(['Either your email or password is incorrect.  Please try again.'])->withInput();
    }
}
