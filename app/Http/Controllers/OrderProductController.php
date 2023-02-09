<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Imports\OrdersImport;
use App\Models\orderProduct;
use Maatwebsite\Excel\Facades\Excel;
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
        $orderProducts = orderProduct::paginate(5);
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

    public function export($page) 
    {
        $data = orderProduct::paginate(5,['*'], 'page', $page);

        return Excel::download(new OrdersExport($data), 'orders.xlsx');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xlsm,xltx,xltm,csv'
        ]);
        Excel::import(new OrdersImport,$request->file('file'));

        return back();
    }
}
