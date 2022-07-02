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

        $user = Auth::user();
        // dd($user->orders);
        return view('orders.index',[
            'orders'=>$user->orders,
            'statuses' => Order::$ORDER_STATUSES
        ]);


        //--------- OLD METHODS ----------
        // kep tjust in case Collections became a problem

        // User::find( Auth::user()->id);

        // $orders = $user->orders()->get();

        // $ordersIds = $orders->map(function($o){
        //     return $o['id'];
        // })->toArray();

        // // dd($ordersIds);
        // $ordersProducts = [];

        // $products = [] ;

        // foreach ($ordersIds as $id){
        //     $orderDetails = OrderHasProduct::where('order_id',$id)->get();
        //     foreach($orderDetails as $detail){
        //         $ordersProducts[$id][]=$detail['product_id'];
        //         $products[] = $detail['product_id'];
        //     }
        // }

        // $cleanList = array_unique($products);

        // $productsList = Product::whereIn('id',$cleanList)->get();

        // dd($ordersProducts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = session()->get('cart');
        if (!$cart){
            return redirect()->route('products')->with('message','nothing to checkout, cart empty');
        }
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = session()->get('cart');
        $total = 0;
        foreach ( $cart as $item){
            $total += $item['total'];
        }

        $address = new AdressController;
        $addressId =$address->create($request);
        $order = Order::create([
            'user_id'=>auth()->id(),
            'address_id'=>$addressId,
            'status'=>'1',
            'total'=> $total
        ]);

        foreach($cart as $item){
            $orderProduct = [
                'order_id'=>$order->id,
                'product_id'=>$item['product']->id,
                'quantity'=>$item['quantity']
            ];
            OrderHasProduct::create($orderProduct);
        }
        session()->forget('cart');
        return redirect()->route('single-order', ['order'=>$order->id])->with('message','Order created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ( $order->user_id != auth()->id()){
            abort(403);
        }
        $products = $order->products;
        return view('orders.show',[
            'order'=>$order,
            'products'=>$products,
            'status' => Order::$ORDER_STATUSES[$order->status]
        ]);
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
    public function update(Request $request, Order $order)
    {
        $field = $request->validate([
            'status'=>'required'
        ]);
        $status = intval($field['status']);
        if ($status >count(Order::$ORDER_STATUSES) || $status <0){
            return back()->with('error','status update failed!');
        }
        $order->update($field);
        return back()->with('message','status update successful');
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


    public function adminIndex(){
        return view('admin.orders.index',[
            'orders'=> Order::all()->last()->paginate(5),
            'statuses' => Order::$ORDER_STATUSES
        ]);
    }

    public function adminShow(Order $order){

        $products = $order->products;
        return view('admin.orders.show',[
            'order'=>$order,
            'products'=>$products,
            'statuses' => Order::$ORDER_STATUSES,
            'status' => Order::$ORDER_STATUSES[$order->status]
        ]);
    }
}
