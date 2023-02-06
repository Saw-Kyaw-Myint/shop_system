<?php

namespace App\Http\Controllers;

use App\Models\orderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     *
     * @param  \App\Models\orderProduct  $orderProduct
     * @return view(order.index)
     */
    public function index()
    {
        $orderProducts = orderProduct::latest('id')->get();
        $todayOrderPrice = 0;
        $today = date('Y-m-d');
        $todayOrder = orderProduct::with('product')->Today($today)->get();
        $orderMonths = [];
        foreach ($orderProducts as $key => $orderProduct) {
            $orderMonths[] = $orderProduct->created_at;
        }
        $orderMonths = array_unique($orderMonths);
        foreach ($todayOrder as $key => $order) {
            $todayOrderPrice += $order->product->price * $order->quantity;
        }

        return view('pages.order.index', compact('orderProducts', 'todayOrderPrice', 'orderMonths'));
    }
}
