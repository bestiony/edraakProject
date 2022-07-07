<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderHasProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Product $product){

        $id = $product->id;
        $cart = session()->get('cart');

        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
            $cart[$id]['total']+= $product->price;
        }

        if ($cart === null){
            $cart[$id] = [
                'product'=>$product,
                'quantity'=>1,
                'total'=>$product->price
            ];
        }
        if (array_key_exists($id,$cart) === false){
            $cart[$id] = [
                'product'=>$product,
                'quantity'=>1,
                'total'=>$product->price
            ];
        }


        session()->put('cart',$cart);
        // dd($cart);
        return redirect()->back();
    }

    public function show(){
        return view('user.products.cart',['cart'=>session()->get('cart')]);
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
        // dd($cart[$id]['product']['price']);
        $cart[$id]['total'] = $newQuantity * $cart[$id]['product']['price'];
        session()->put('cart',$cart);
        return redirect()->back()->with('message',"quantity changed successfully");
    }

    public function delete (Product $product){
        $cart = session()->get('cart');
        $id = $product->id;
        if($cart[$id]['quantity'] >1){
            $cart[$id]['quantity']--;

        }else {
            unset($cart[$id]);
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('message',"product was removed from cart");
    }


    // public function checkout(){
    //     $cart = session()->get('cart');
    //     if (!$cart){
    //         return redirect()->route('products')->with('message','nothing to checkout, cart empty');
    //     }
    //     return view('products.checkout');
    // }

    public function confirmOrder(Request $request){
        // $cart = session()->get('cart');
        // $total = 0;
        // foreach ( $cart as $item){
        //     $total += $item['total'];
        // }

        // $address = new AdressController;
        // $addressId =$address->create($request);
        // $order = Order::create([
        //     'user_id'=>auth()->id(),
        //     'address_id'=>$addressId,
        //     'status'=>'1',
        //     'total'=> $total
        // ]);

        // foreach($cart as $item){
        //     $orderProduct = [
        //         'order_id'=>$order->id,
        //         'product_id'=>$item['product']->id,
        //         'quantity'=>$item['quantity']
        //     ];
        //     OrderHasProduct::create($orderProduct);
        // }
        // return redirect()->route('home');
    }
}
