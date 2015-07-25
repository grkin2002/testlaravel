<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getEmail()
    {
        return view('auth.password');
    }

    public function postEmail()
    {

        //send email and give a message
        return  Response('<h1> <a href="'.url('/home').'"> Your email have been sent, Click to Main page!</a></h1> ');
    }

    public function getReset()
    {
        //go to reset password view
        return view('auth.reset');
    }

    public function postReset()
    {
        //reset the password and go back to home
        return view('/home');
    }

}
