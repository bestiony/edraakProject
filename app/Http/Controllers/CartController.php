<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Product $product){
        $id = $product->id;
        $cart = session()->get('cart');
        if (!$cart){
            $cart[$id] = [
                'product'=>$product,
                'quantity'=>0
            ];
        }
        if (!array_key_exists($id,$cart)){
            $cart[$id] = [
                'product'=>$product,
                'quantity'=>0
            ];
        }
        if ($cart[$id]){
            $cart[$id]['quantity']++;
        }

        session()->put('cart',$cart);
        return redirect()->back();
    }

    public function show(){
        return view('products.cart',['cart'=>session()->get('cart')]);
    }

    public function edit(Product $product){
        $cart = session()->get('cart');
        $id = $product->id;
        if (!array_key_exists($id, $cart)){
            return redirect()->back()->with('message',"product isn/'t in cart");
        }
        $newQuantity = request('quantity') !== null ? intval(request('quantity')) : 0;
        if($newQuantity === 0){
            unset($cart[$id]);
            session()->put('cart',$cart);
            return redirect()->back()->with('message',"product was removed from cart");
        }
        $cart[$id]['quantity'] = $newQuantity;
        session()->put('cart',$cart);
        return redirect()->back()->with('message',"quantity changed successfully");
    }

    public function delete (Product $product){
        $cart = session()->get('cart');
        $id = $product->id;
        unset($cart[$id]);
        session()->put('cart',$cart);
        return redirect()->back()->with('message',"product was removed from cart");
    }


    public function checkout(){
        return view('products.checkout');
    }
}
