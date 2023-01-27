<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Shoppingcart;
use Livewire\Component;

class Productlist extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.productlist');
    }

    public function addToCart($id)
    {
        if (auth()->user()) {
            $data=[
                'user_id'=>auth()->user()->id,
                'product_id'=>$id,
            ];
            Shoppingcart::updateOrCreate($data);
            session()->flash('success','Product added to the cart successfully');
        } else {
            return redirect()->route('login.create');
        }
    }
}
