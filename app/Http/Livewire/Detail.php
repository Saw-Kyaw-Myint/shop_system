<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public $productId;
    public $product;
    public $relatedProduct;
    public $comment;
    


    public function mount($productId)
    {
        $this->product = Product::find($productId);
        $this->relatedProduct = Product::Related($this->product->category_id, $this->product->id)->get();
    }

    public function render()
    {
        return view('livewire.detail');
    }

    public function addCart($id)
    {
        // dd($this->quantity);
        if (!(auth()->user())) {

            return redirect()->route('login.create')->with('warning', "Please login to order product");
        }
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "product" => $product->id,
                    "title" => $product->title,
                    "image" => $product->image,
                    "description" => $product->description,
                    "quantity" => 1,
                    "price" => $product->price,
                    "category_id" => $product->category_id,
                ],
            ];
            session()->put('cart', $cart);
            $this->emit('updateCartCount');

            return redirect()->back()->with('success', 'added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $this->emit('cartSummery');
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "product" => $product->id,
            "title" => $product->title,
            "image" => $product->image,
            "description" => $product->description,
            "quantity" => 1,
            "category_id" => $product->category_id,
            "price" => $product->price,
        ];
        $this->emit('updateCartCount');
        session()->put('cart', $cart);
        // dd('success');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}
