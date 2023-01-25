<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(StoreLoginRequest $request){
        $user_data = array(
            'email' => $request->email,
            'password'  => $request->password,
        );
        $input_data = Auth::attempt($user_data);
        if (!$input_data) {

            return  redirect()->route('login.create')->with('error', 'Email and password is incorrect');
        }
     
        
        return redirect()->route('home.index');
    }
}
