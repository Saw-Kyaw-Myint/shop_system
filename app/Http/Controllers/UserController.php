<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $products=Product::Search(request('q'))->latest('id')->get();
        $latestProducts=Product::latest('id')->take(8)->get();
        $categories=Category::with('products')->get();
        return view('index',compact('products','categories','latestProducts'));
    }

    public function addCart(){
        $categories=Category::has('products')->with('products')->get();
       return view('add_cart',compact('categories'));
    }

    public function list(){
        $users=User::latest('id')->get();

        return view('pages.user.index',compact('users'));
    }

    public function destroy($id){
      $user=User::find($id);
      $user->delete();

      return back();
    }

}
