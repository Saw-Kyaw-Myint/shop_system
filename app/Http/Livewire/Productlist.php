<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Productlist extends Component
{
    public $products, $latestProducts, $categories;

    /**
     * @return respone
     */
    public function mount()
    {
        $this->categories = Category::has('products')->with('products')->get();
        $this->products = Product::Search(request('q'))->latest('id')->get();
    }

    /**
     * add order cart.
     *
     * @return view('productList')
     */
    public function render()
    {
        return view('livewire.productlist', ['products' => $this->products]);
    }

    /**
     * search category.
     *
     * @return this->product
     */
    public function search($category)
    {
        $this->products = Product::Filter($category)->get();
    }

    /**
     * add order cart.
     *
     * @return back()
     */
    public function addToCart($id)
    {
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
                    "user_id" => auth()->user()->id,
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
            "title" => $product->title,
            "image" => $product->image,
            "description" => $product->description,
            "quantity" => 1,
            "category_id" => $product->category_id,
            "price" => $product->price,
        ];
        $this->emit('updateCartCount');
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
