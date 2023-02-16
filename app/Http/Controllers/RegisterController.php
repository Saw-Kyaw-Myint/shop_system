<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Mail\RegisterMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

     /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        // $this->middleware('guest:admin');
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['route' => route('admin.register'), 'title'=>'Admin']);
    }


    protected function createAdmin(StoreRegisterRequest $request)
    {
        // $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // return redirect()->intended('admin');
        return  redirect()->route('login.create');
    }
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
