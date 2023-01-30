<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shoppingcart;
use Livewire\Component;

class Productlist extends Component
{
    public $products,$latestProducts,$categories;

    public function render()
    {
        $this->products = Product::Search(request('q'))-> get();;
        return view('livewire.productlist');
    }

    public function search($category){
    
        $this->products=Product::Filter($category)->get();
        dd($this->products);
    
        // $this->latestProducts=Product::latest('id')->take(8)->get();
        // $this->categories=Category::has('products')->with('products')->get();
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

            $this->emit('updateCartCount');
            
            session()->flash('success','Product added to the cart successfully');
        } else {
            return redirect()->route('login.create');
        }
    }
}
