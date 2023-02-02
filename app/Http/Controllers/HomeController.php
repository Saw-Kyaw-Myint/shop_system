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
    public function index()
    {

        $today = date('Y-m-d');
        $orderCount = orderProduct::with('product')->whereDate('created_at', '=', $today)->count();
        $products = Product::latest('id')->get();
        $totalProduct = Product::count();
        $totalUser = User::count();
        $totalCategory = Category::count();

        $countOrderByMonth = [];
        $chartMonths = [];

        $months = [];
        for ($i = 0; $i < 12; $i++) {
            $months[] = Carbon::now()->subMonth($i)->format('m');
            $chartMonths[] = Carbon::now()->subMonth($i)->format('F');
        }
        $categoryArray = [];
        $categoryProduct=[];

        $Categories = Category::all();

      
  
        // return $categoryOrder;

        foreach ($Categories as $key => $category) {
        $categoryArray[] = $category->ctitle;
         $categoryProduct[]=Product::with('category')->Filter($category->id)->count();
        }

        foreach ($months as $c) {
            $data = DB::table('order_products')
                ->whereRaw("MONTH(created_at) = {$c}")->count();
            $productData = DB::table('products')
                ->whereRaw("MONTH(created_at) = {$c}")->count();

            $countOrderByMonth[] = $data;
        }

        return view('admin.index', compact('products', 'orderCount', 'totalProduct', 'totalUser', 'totalCategory', 'chartMonths', 'countOrderByMonth','categoryArray','categoryProduct'));
    }
}
