<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Mail\LoginMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(StoreLoginRequest $request)
    {
        $user_data = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $input_data = Auth::attempt($user_data);
        if (!$input_data) {

            return redirect()->route('login.create')->with('error', 'Email and password is incorrect');
        }

        Mail::to(Auth::user()->email)
            ->send(new LoginMail());
        if (auth()->user()->role == 1) {
            
            return redirect()->route('index');
        }

        return redirect()->route('home.index');
    }
}
