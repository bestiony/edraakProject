<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home',[
            'products'=>Product::inRandomOrder()->limit(3)->get(),
            'random' =>Product::inRandomOrder()->first(),
            'categories'=>Category::all(),
            'subcategories'=>Subcategory::all()
        ]);
    }
}
