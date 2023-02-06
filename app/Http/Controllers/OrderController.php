<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Http\Requests\UpdateOrderRequest;
use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\orderProduct;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('id')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $totalOrder = session()->get('cart');
        $sub_total = 0;
        foreach ($totalOrder as $item) {
            $sub_total += $item['price'] * $item['quantity'];
        }
        $tax = ($sub_total / 100) * 15;
        $totalPrice = $sub_total + $tax;

        return view('checkout', compact('categories', 'totalOrder', 'sub_total', 'totalPrice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $addCart = session()->get('cart');
        foreach ($addCart as $key => $orderCart) {
            if (isset($orderCart['product'])) {
                $product_id = $orderCart['product'];
            }
            orderProduct::create([
                'quantity' => $orderCart['quantity'],
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
            ]);
        }
        $time = 1;
        Order::create([
            'user_id' => auth()->user()->id,
            'order_time' => $time,
        ]);
        $user = User::find(auth()->user()->id);
        $data = [
            'address' => $request->address,
            'region' => $request->region,
            'phone' => $request->phone,
        ];
        $user = $user->update($data);
        if ($user) {
            Mail::to(auth()->user()->email)
                ->send(new OrderMail());
            session()->forget('cart');

            return redirect()->route('index')->with('success', 'order is successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return back()
     */
    public function destroy($order)
    {
        $orderProduct = orderProduct::find($order);
        $orderProduct->delete();

        return back();
    }
}
