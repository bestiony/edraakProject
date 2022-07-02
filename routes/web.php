<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//landing page

// browse products
Route::get('/products',[ProductController::class,'index'])->name('products');

// check product page
Route::get('/product/{product}',[ProductController::class,'show'])->name('single-product');



Route::middleware('auth')->group(function(){
    // add to cart order
    Route::post('add-to-cart/{product}',[CartController::class,'store'])->name('add-to-cart');

    // see cart page
    Route::get('cart',[CartController::class,'show'])->name('cart');

    // modify quantity
    Route::post('modify-cart/{product}',[CartController::class,'edit'])->name('modify-cart')->middleware('auth');


    // remove products from cart
    Route::post('delete-from-cart/{product}',[CartController::class,'delete'])->name('delete-from-cart');

    // show  check out page
    // add delivery and payment information
    Route::get('checkout',[OrderController::class,'create'])->name('checkout');

    // confirm order (create)
    Route::post('confirm-order',[OrderController::class,'store'])->name('confirm-order');


    // show orders info page
    Route::get('orders',[OrderController::class,'index'])->name('orders');

    // show single order info page

    Route::get('orders/{order}',[OrderController::class,'show'])->name('single-order');


});


// ------------- Admin area ------------

require __DIR__.'/admin.php';





