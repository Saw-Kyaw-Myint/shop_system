<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Mail\LoginMail;
use App\Models\BanList;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['route' => route('admin.login-view'), 'title'=>'Admin']);
    }

    public function adminLogin(StoreLoginRequest $request)
    {
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        $user_data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        $input_data = Auth::guard('admin')->attempt($user_data);
       if($input_data){
        return  redirect()->intended('/dashboard');
       }
       dd($input_data);
        return back()->withInput($request->only('email', 'remember'));
    }



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
        $banEmail = BanList::where('email', '=', $request->email)->get();
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

        return redirect()->route('index');
    }
}
