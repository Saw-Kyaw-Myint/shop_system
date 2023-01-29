<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Category;
use App\Models\orderProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Shoppingcart  as Cart;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        $totalOrder=Cart::with('product')->where('user_id','=',auth()->user()->id)->get();
        $sub_total=0;
        foreach($totalOrder as $item){
            $sub_total +=$item->product->price * $item->quantity;
        }
        $tax=($sub_total/100) * 15;
        $totalPrice=$sub_total + $tax;

         return view('checkout',compact('categories','totalOrder','sub_total','totalPrice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //return $request;

        $addCart=Cart::with('product')->where('user_id','=',auth()->user()->id)->get();

       foreach ($addCart as $key => $orderCart) {
        $orderProduct=orderProduct::create([
            'quantity'=>$orderCart->quantity,
            'user_id'=>$orderCart->user_id,
            'product_id'=>$orderCart->product_id,
           ]);

       }

         $user=User::find(auth()->user()->id);
         $user->shooppingCart()->delete();
        // dd('yu')
        $data=[
            'address'=>$request->address,
            'region'=>$request->region,
            'phone'=>$request->phone,
        ];
       $user= $user->update($data);
    //   dd($user);
           if($user){
            return redirect()->route('index')->with('success','order is successfully');
           }
    dd('hla');
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
    public function destroy(Order $order)
    {
        //
    }
}
