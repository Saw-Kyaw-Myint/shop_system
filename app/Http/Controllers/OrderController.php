<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Category;
use App\Models\orderProduct;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

        // $tokenprovider=[];

        // $provider = new PayPalClient([]);
        // $provider->setApiCredentials(config('paypal'));
        // // $token = $provider->getAccessToken();
        // // $provider->setAccessToken($token);  

        // // dd($provider);

        // $order = $provider->createOrder([
        //     "intent" => "CAPTURE",
        //     "purchase_units" => [
        //         [
        //             "amount" => [
        //                 "currency_code" => 'USD',
        //                 'value'  => 224,
        //             ]
        //         ]
        //     ],
        //     'application_context' => [
        //         'cancel_url' => route('payment.cancel'),
        //         'return_url' => route('payment.success')
        //     ]

        // ]);

        // dd($order);

        //  return response()->json_encode($order, JSON_FORCE_OBJECT);

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
        $user->shooppingCart()->delete();

        $data = [
            'address' => $request->address,
            'region' => $request->region,
            'phone' => $request->phone,
        ];
        $user = $user->update($data);
        if ($user) {
            session()->forget('cart');

            return redirect()->route('index')->with('success', 'order is successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($order)
    {
        $orderProduct=orderProduct::find($order);
        $orderProduct->delete();
        
        return back();

    }
}
