<?php

use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CategoryController;



use App\Models\Catelogue;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::query()->latest('id')->limit(5)->get();

    return view('welcome',compact('products'));
});


// Route::resource('categories', CategoryController::class);

Auth::routes();



Route::get('product/{slug}', [ProductController::class,'detail'])->name('product.detail');

Route::post('cart/add', [CartController::class,'add'])->name('cart.add');
Route::get('cart/list', [CartController::class,'list'])->name('cart.list');

