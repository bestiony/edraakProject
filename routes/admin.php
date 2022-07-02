<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login',[AdminController::class,'loginPage'])->middleware('notadmin');

Route::post('admin/login',[AdminController::class,'authenticate'])->name('admin.login');
Route::middleware('isadmin')->prefix('admin')->group(function () {





Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');
});
