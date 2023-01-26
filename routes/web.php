<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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


//register
Route::get('/register',[RegisterController::class, 'create'])->name('register.create');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

//Login
Route::get('/login',[LoginController::class, 'create'])->name('login.create');
Route::post('/login',[LoginController::class, 'store'])->name('login.store');

//Home
Route::get('/dashboard',[HomeController::class, 'index'])->name('home.index');

//product
Route::resource('/product',ProductController::class);

//category
Route::resource('/category',CategoryController::class);

Route::get('/{category}',[ProductController::class,'search'])->name('category.search');