<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Productlist extends Component
{
    public $products, $latestProducts, $categories, $searchValue;
    protected $listeners = ['productSearch' => 'index'];
    protected $listener = ['productAdd' => 'addToCart'];
    /**
     * @return respone
     */
    public function mount()
    {
        $this->categories = Category::has('products')->with('products')->get();
        $this->index('');
    }

    /**
     * add order cart.
     *
     * @return view('productList')
     */
    public function render()
    {
        $category=session()->get('category');
        
        if($category !=null){
            $this->search($category);
        }

        return view('livewire.productlist');
    }

    /**
     * search category.
     *
     * @return this->product
     */
    public function search($category)
    {
        session()->put('category',$category);
        $this->products = Product::Filter($category)->get();
    }

    public function index($request)
    {
        $this->products = Product::Search($request)->get();
        if ((strlen($request)) == 0) {
            $this->searchValue = $request;
        } else {
            $this->searchValue = 'Result for :  ' . $request;
        }
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
                    "price" => $product->price,
                    "category_id" => $product->category_id,
                ],
            ];
            session()->put('cart', $cart);
            $this->emit('updateCartCount');

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Order id Successfully',
                'icon'=>'success',
                // 'iconColor'=>'blue',
            ]);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $this->emit('cartSummery');
            session()->put('cart', $cart);
          
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Order is successfully',
                'icon'=>'success',
            ]);

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

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Order is successfully',
            'icon'=>'success',
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function detail(){
        return view('livewire.detail');
    }
}
