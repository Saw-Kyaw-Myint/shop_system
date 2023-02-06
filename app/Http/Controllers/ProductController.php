<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::Search(request('q'))->get();

        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageName = uniqid() . "image" . $request->image->extension();
            $request->image->storeAs('public/', $imageName);
        }
        $data = [
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'category_id' => $request->category,
            'price' => $request->price,
        ];
        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('pages.product.edi', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $imageName = uniqid() . "updateImage" . $request->image->extension();
            $request->image->storeAs('public/', $imageName);
        } else {
            $imageName = $product->image;
        }
        $data = [
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
        ];
        $product->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }

    /**
     * * Search form Product.
     * @param  \App\Models\Product  $Product
     * @return view(admin.index)
     */
    public function search($category)
    {
        $products = Product::Filter($category)->get();
        $latestProducts = Product::latest('id')->take(8)->get();
        $categories = Category::has('products')->with('products')->get();

        return view('index', compact('products', 'categories', 'latestProducts'));
    }
}
