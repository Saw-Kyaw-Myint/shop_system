<?php

namespace App\Http\Controllers;

use App\Models\orderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    
    public function index(){
        $orderProducts=orderProduct::latest('id')->get();

        return view('pages.order.index',compact('orderProducts'));
    }
}
