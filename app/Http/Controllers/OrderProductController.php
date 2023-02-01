<?php

namespace App\Http\Controllers;

use App\Models\orderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    
    public function index(){
        $orderProducts=orderProduct::latest('id')->get();
        $todayOrderPrice= 0;

        $today = date('Y-m-d');
        $todayOrder=orderProduct::with('product')->whereDate('created_at','=',$today)->get();
        foreach ($todayOrder as $key => $order) {
         $todayOrderPrice +=$order->product->price * $order->quantity;
        }

        return view('pages.order.index',compact('orderProducts','todayOrderPrice'));
    }
}
