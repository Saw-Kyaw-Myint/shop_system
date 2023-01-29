<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart as Cart;
use Livewire\Component;

class Shoppingcart extends Component
{
    public  $cartItems, $sub_total=0,$total=0,$tax=0,$countCart=0;
    public function render()
    {
        $this->cartItems = Cart::with('product')->where('user_id','=',auth()->user()->id)->get();

        info($this->cartItems);

        $this->total=0;$this->sub_total=0;$this->tax=0;
        foreach($this->cartItems as $item){
            $this->sub_total +=$item->product->price * $item->quantity;
        }
        $this->tax=($this->sub_total/100) * 15;
        $this->total=$this->sub_total + $this->tax;
        return view('livewire.shoppingcart');
    }

    public function increment($id){
        $cart=Cart::whereId($id)->first();
        $cart->quantity+=1;
        $cart->save();
    }

    public function decrement($id){
        $cart=Cart::whereId($id)->first();

        if($cart->quantity > 1){
            $cart->quantity -=1;
            $cart->save();
    }else{
      session()->flash('alert','quantity is grather than one');
    }
}

public function removeCart($id){
    $cart=Cart::whereId($id)->first();
    if($cart){
        $cart->delete();
        $this->emit('updateCartCount');
    }

    session()->flash('success','product is removed from cart');

}

 public function countCart(){
 $this->countCart=Cart::wherUserId(auth()->user()->id)->count();
 }
}
