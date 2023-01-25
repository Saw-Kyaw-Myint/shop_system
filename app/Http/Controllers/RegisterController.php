<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return  view('auth.register');
    }

    public function store(StoreRegisterRequest $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($data);
        $user_data = array(
            'email' => $request->email,
            'password'  => $request->password,
        );
        $input_data = Auth::attempt($user_data);
        if($input_data){
             
        return redirect()->route('post.index');
        }

        return redirect()->route('login.create');
    }
}
