<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index(){
        $products=Product::Search(request('q'))->latest('id')->get();
        $latestProducts=Product::latest('id')->take(8)->get();
        $categories=Category::has('products')->with('products')->get();
        
        return view('index',compact('products','categories','latestProducts')); 
    }
    
}
