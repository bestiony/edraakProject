<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;

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

Route::get('products/create',[ProductController::class,'create'])->name('admin.create-product');


Route::post('products/store',[ProductController::class,'store'])->name('admin.store-product');

Route::get('products/{product}',[ProductController::class,'adminShow'])->name('admin.show');

Route::get('products/{product}/edit',[ProductController::class,'edit'])->name('admin.edit-product');

Route::put('products/{product}/update',[ProductController::class,'update'])->name('admin.update-product');

Route::delete('products/{product}/destroy',[ProductController::class,'destroy'])->name('admin.destroy-product');



        // --------admin <> categories ---------

Route::get('categories',[CategoryController::class,'index'])->name('admin.categories');
// Route::get('categories/create',[CategoryController::class,'create'])->name('admin.create-category');

Route::post('categories/store',[CategoryController::class,'store'])->name('admin.store-category');
// Route::get('categories/{category}',[CategoryController::class,'show'])->name('admin.show-category');
Route::get('categories/{category}/edit',[CategoryController::class,'edit'])->name('admin.edit-category');
Route::put('categories/{category}/update',[CategoryController::class,'update'])->name('admin.update-category');
Route::delete('categories/{category}/destroy',[CategoryController::class,'destroy'])->name('admin.destroy-category');


    // --------admin <> SUBcategories ---------

    Route::get('subcategories',[SubcategoryController::class,'index'])->name('admin.subcategories');
    Route::get('subcategories/create',[SubcategoryController::class,'create'])->name('admin.create-subcategory');
    Route::post('subcategories/store',[SubcategoryController::class,'store'])->name('admin.store-subcategory');
    Route::get('subcategories/{subcategory}',[SubcategoryController::class,'show'])->name('admin.show-subcategory');
    Route::get('subcategories/{subcategory}/edit',[SubcategoryController::class,'edit'])->name('admin.edit-subcategory');
    Route::put('subcategories/{subcategory}/update',[SubcategoryController::class,'update'])->name('admin.update-subcategory');
    Route::delete('subcategories/{subcategory}/destroy',[SubcategoryController::class,'destroy'])->name('admin.destroy-subcategory');

    // Extra
    Route::put('subcategories/{subcategory}/{product}/destroy',
        [ProductController::class,'delete_product_subcategory_link'])->name('unlink-product-subcategory');




    // --------admin <> users ---------

    Route::get('users',[UserController::class,'index'])->name('admin.users');
    // Route::get('users/create',[UserController::class,'create'])->name('admin.create-user');
    // Route::post('users/store',[UserController::class,'store'])->name('admin.store-user');
    Route::get('users/{user}',[UserController::class,'show'])->name('admin.show-user');
    // Route::get('users/{user}/edit',[UserController::class,'edit'])->name('admin.edit-user');
    // Route::put('users/{user}/update',[UserController::class,'update'])->name('admin.update-user');
    // Route::delete('users/{user}/destroy',[UserController::class,'destroy'])->name('admin.destroy-user');
    Route::put('users/status/{user}/{status_code}',[UserController::class,'updateStatus'])->name('updateStatus');

});
