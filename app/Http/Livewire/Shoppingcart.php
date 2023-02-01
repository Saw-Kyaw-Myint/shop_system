<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart as Cart;
use Livewire\Component;

class Shoppingcart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0, $countCart = 0, $sumCart = 0;

    protected $listeners = ['cartSummery' => 'countCart'];

    public function render()
    {
        $this->countCart();
        
        $this->cartItems = session()->get('cart')==null ? [] : session()->get('cart');
             
        return view('livewire.shoppingcart');
    }

    public function increment($id)
    {

        $cart = session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$id]['quantity'] += 1) {
                break;
            }
        }
        session()->put('cart', $cart);

        return back();
    }

    public function decrement($id)
    {
        $cart = session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            if (($cart[$id]['quantity']) > 1) {
                if ($cart[$id]['quantity'] -= 1) {
                    break;
                } else {
                    break;
                }
            }
        }
        session()->put('cart', $cart);

        return back();
    }

    public function removeCart($id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        session()->flash('success', 'product is removed from cart');
    }

    public function countCart()
    {
        $this->sumCart = session()->get('cart')==null ? [] : session()->get('cart');
        $this->total = 0;
        $this->sub_total = 0;
        $this->tax = 0;
        foreach ($this->sumCart as $id => $item) {
            $this->sub_total += $item['price'] * $item['quantity'];
        }
        $this->tax = ($this->sub_total / 100) * 15;
        $this->total = $this->sub_total + $this->tax;
    }
}
