<?php

namespace App\Http\Controllers;

use App\Mail\Ban;
use App\Mail\UnBanMail;
use App\Models\BanList;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view('index')
     */
    public function index()
    {
        $products = Product::Search(request('q'))->latest('id')->get();
        $latestProducts = Product::latest('id')->take(8)->get();
        $categories = Category::with('products')->get();

        return view('index', compact('products', 'categories', 'latestProducts'));
    }

    /**
     * add order cart.
     *
     * @return view('add_cart)
     */
    public function addCart()
    {
        $categories = Category::has('products')->with('products')->get();

        return view('add_cart', compact('categories'));
    }

    /**
     * show cart list
     *
     * @return view('user.index)
     */
    public function list()
    {
        $users = User::latest('id')->get();

        return view('pages.user.index', compact('users'));
    }

    /**
     * destroy order cart.
     *
     * @return view('add_cart)
     */
    public function destroy($id)
    {
        $user = User::find($id);
        BanList::create([
            'email' => $user->email,
        ]);
        $data = [
            'name' => $user->name,
            'email' => $user->email
        ];
        Mail::to($user->email)
            ->send(new Ban($data));
        $user->delete();

        return back();
    }
    
    /**
     * banded User list.
     *
     * @return view(banList)
     */
    public function banList()
    {
        $users = User::onlyTrashed()->get();

        return view('pages.user.banList', compact('users'));
    }

    /**
     * un ban $user.
     *
     * @return back()
     */
    public function unban($id)
    {
        $user = User::onlyTrashed()->find($id);
        $data = [
            'name' => $user->name,
            'email' => $user->email
        ];
        Mail::to($user->email)
            ->send(new UnBanMail($data));
        $user->delete();
        $banUser = BanList::where('email', '=', $user->email);
        $banUser->delete();
        $user->restore();

        return back();
    }
}
