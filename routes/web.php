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
use App\Models\orderProduct;
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
Route::resource('/order',OrderController::class);
Route::get('/shoopingcart',[UserController::class, 'addCart'])->name('addcart');


//auth
Route::group(['middleware' => ['auth']], function () {
//register
Route::get('/register',[RegisterController::class, 'create'])->name('register.create');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');
//Login
Route::get('/login',[LoginController::class, 'create'])->name('login.create');
Route::post('/login',[LoginController::class, 'store'])->name('login.store');
});

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

//Admin
Route::group(['middleware' => ['admin']], function () {
Route::get('/dashboard',[HomeController::class, 'index'])->name('home.index');
Route::get('/user',[UserController::class, 'list'])->name('user.list');
Route::get('/user/banList',[UserController::class, 'banList'])->name('user.banList');
Route::get('/user/unban/{id}',[UserController::class, 'unban'])->name('user.unban');
Route::delete('/user/{id}',[UserController::class, 'destroy'])->name('user.destroy');
Route::get('/order',[OrderProductController::class,'index'])->name('orderProduct.index');
Route::get('/orderMonths/{moth}',[OrderProductController::class, 'monthIncome'])->name('month.order');

//product
Route::resource('/product',ProductController::class);

//category
Route::resource('/category',CategoryController::class);


//excel
Route::get('users/export/{page}', [UserController::class, 'export'])->name('user.export');
Route::get('orders/export/{page}', [OrderProductController::class, 'export'])->name('order.export');

Route::post('users/import/', [UserController::class, 'import'])->name('user.import');
Route::post('orders/import/', [OrderProductController::class, 'import'])->name('order.import');
});




Route::get('/{category}',[Productlist::class,'search'])->name('category.search');

//lang
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


//livewire

// Route::get('payment-cancel',function(){
//     dd('cancel');
// })->name('payment.cancel');

// Route::get('payment-success',function(){
//     dd('success');
// })->name('payment.success');

