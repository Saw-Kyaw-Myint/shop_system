<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\orderProduct;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
       /**
     *
     * @param  \App\Models\orderProduct  $orderProduct
     * @return view(admin.index)
     */
    public function index()
    {
        $today = date('Y-m-d');
        $orderCount = orderProduct::with('product')->Today($today)->count();
        $products = Product::latest('id')->get();
        $totalProduct = Product::count();
        $totalUser = User::count();
        $totalCategory = Category::count();
        // for graph 
        $countOrderByMonth = [];
        $chartMonths = [];
        $months = [];
        //order by month graph
        for ($i = 0; $i < 12; $i++) {
            $months[] = Carbon::now()->subMonth($i)->format('m');
            $chartMonths[] = Carbon::now()->subMonth($i)->format('F');
        }
        // for cartegory by product 
        $categoryArray = [];
        $categoryProduct = [];
        $Categories = Category::all();
        foreach ($Categories as $key => $category) {
            $categoryArray[] = $category->ctitle;
            $categoryProduct[] = Product::with('category')->Filter($category->id)->count();
        }
        foreach ($months as $c) {
            $data = orderProduct::Filter($c)->count();
            $productData = Product::Month($c)->count();
            $countOrderByMonth[] = $data;
        }

        return view('admin.index', compact('products', 'orderCount', 'totalProduct', 'totalUser', 'totalCategory', 'chartMonths', 'countOrderByMonth', 'categoryArray', 'categoryProduct'));
    }
}
