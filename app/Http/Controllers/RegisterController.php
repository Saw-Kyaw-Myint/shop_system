<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     *
     * @return view(auth.register)
     */
    public function create()
    {
        return view('auth.register');
    }

   /**
     * Store the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisterRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($data);
        $user_data = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $input_data = Auth::attempt($user_data);
        if ($input_data) {
            Mail::to(Auth::user()->email)
                ->send(new RegisterMail());

            return redirect()->route('index');
        }

        return redirect()->route('login.create');
    }
}
