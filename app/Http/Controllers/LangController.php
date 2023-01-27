<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\App as FacadesApp;

class LangController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('lang');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function change(Request $request)
    {
        FacadesApp::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }
}
