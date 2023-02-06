<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Mail\LoginMail;
use App\Models\BanList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

       /**
     * @return view('auth.login)
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelotinRequest  $request
     * @return route('login.create')
     */
    public function store(StoreLoginRequest $request)
    {
        $user_data = array(
            'email' => $request->email,
            'password' => $request->password,
        );
         $banEmail=BanList::where('email','=',$request->email)->get();
        //  dd($banEmail);
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

 /**
     * Remove the specified sesion.
     *
     * @param  \App\Models\User  $user
     * @return route('index)
     */
    public function logout()
    {
        $logout = Auth::logout();

        return   redirect()->route('index');
    }
}
