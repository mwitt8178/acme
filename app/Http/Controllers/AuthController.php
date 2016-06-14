<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\PasswordResets;
use App\Http\Requests\SavePasswordRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @return return forgot-password.blade.php
     */
    public function showForgotPassword(){
        return view('auth.forgot-password');
    }

    /**
     * @param $token
     * @return return reset-password.blade.php
     */
    public function showResetPassword($token){
        return view('auth.reset-password')->withToken($token);
    }

    /**
     * @param Requests\ForgotPasswordRequest $request
     * Send forgot password email if email exists in DB
     * @return return redirect
     */
    public function sendForgotPassword(Requests\ForgotPasswordRequest $request){
        $user = $this->user->where('email', $request->input('email'))->first();
        
        if(!empty($user)){
            $token = hash('md5', $user->username.Carbon::now());

            Mail::send('emails.password', ['token' => $token], function ($m) use ($user) {
                $m->from('do-not-reply@acme.com', 'Acme, Inc');

                $m->to($user->email, $user->name)->subject('Forgot Password');
            });

            $password_resets = new PasswordResets();
            $password_resets->email = $user->email;
            $password_resets->token = $token;
            $password_resets->save();

            return redirect('/')->with('auth_message', 'Forgot Password Successfully Sent!');;
        }

        return redirect()->back()->withErrors(['Email is not registered with Acme, Inc.']);;

    }

    /**
     * @param $token
     * @param SavePasswordRequest $request
     * @return mixed
     */
    public function savePassword($token, SavePasswordRequest $request){
        $password_reset = PasswordResets::where('token', $token)->first();
        User::where('email', $password_reset->email)->update(['password' => Hash::make($request->password)]);
        PasswordResets::where('email', $password_reset->email)->delete();

        return redirect('/')->with('auth_message', 'You have successfully changed your password');
    }

    /**
     * @return mixed
     */
    public function logout(){
        Auth::logout();
        return redirect('/')->with('auth_message', 'You have successfully logged out!');
    }
}
