<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login',[AdminController::class,'loginPage'])->middleware('notadmin');

Route::post('admin/login',[AdminController::class,'authenticate'])->name('admin.login');


Route::middleware('isadmin')->prefix('admin')->group(function () {

Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');

        // -------- admin <> orders ----------

Route::get('orders',[OrderController::class,'adminIndex'])->name('admin.orders');

Route::get('orders/{order}',[OrderController::class,'adminShow'])->name('admin.single-order');

// Route::get('orders/{order}/edit',[OrderController::class,'adminEdit'])->name('admin.edit-order');

Route::put('orders/{order}/update',[OrderController::class,'update'])->name('admin.update-order');


        // --------admin <> products ---------

Route::get('products',[ProductController::class,'adminIndex'])->name('admin.products');
});
