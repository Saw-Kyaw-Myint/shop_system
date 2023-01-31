<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Productlist;
use App\Http\Livewire\Shoppingcart;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UserController::class, 'index'])->name('index');
Route::get('/shoopingcart',[UserController::class, 'addCart'])->name('addcart');
Route::resource('/order',OrderController::class);



//register
Route::get('/register',[RegisterController::class, 'create'])->name('register.create');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

//Login
Route::get('/login',[LoginController::class, 'create'])->name('login.create');
Route::post('/login',[LoginController::class, 'store'])->name('login.store');

//dashboard
Route::get('/dashboard',[HomeController::class, 'index'])->name('home.index');
Route::get('/user',[UserController::class, 'list'])->name('user.list');
Route::delete('/user/{id}',[UserController::class, 'destroy'])->name('user.destroy');
Route::get('/order',[OrderProductController::class,'index'])->name('orderProduct.index');


//product
Route::resource('/product',ProductController::class);

//category
Route::resource('/category',CategoryController::class);

Route::get('/{category}',[Productlist::class,'search'])->name('category.search');

//lang
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

//livewire

Route::get('payment-cancel',function(){
    dd('cancel');
})->name('payment.cancel');

Route::get('payment-success',function(){
    dd('success');
})->name('payment.success');

