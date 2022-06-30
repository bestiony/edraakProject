<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OrderHasProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user =User::find( Auth::user()->id);

        $orders = $user->orders()->get();

        $ordersIds = $orders->map(function($o){
            return $o['id'];
        })->toArray();

        // dd($ordersIds);
        $ordersProducts = [];

        $products = [] ;

        foreach ($ordersIds as $id){
            $orderDetails = OrderHasProduct::where('order_id',$id)->get();
            foreach($orderDetails as $detail){
                $ordersProducts[$id][]=$detail['product_id'];
                $products[] = $detail['product_id'];
            }
        }

        $cleanList = array_unique($products);

        $productsList = Product::whereIn('id',$cleanList)->get();

        dd($productsList);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
