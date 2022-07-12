<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
        return view('user.orders.index',[
            'user'=>$user,
            'orders'=>$user->orders->paginate(1),
            'statuses' => Order::$ORDER_STATUSES,
            'bg_colour' => ' bg-gray-100 '
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
    public function create(Request $request,$oldaddress= false)
    {

        $cart = session()->get('cart');
        if (!$cart){
            return redirect()->route('products')->with('error','nothing to checkout, cart empty');
        }



        $user = auth()->user();
        $address = new AdressController;

        if($oldaddress){
            if(!Address::find($oldaddress)){
                return back()->with('error','sorry address doesn\'exists!');
            }
            if($user->addresses->contains($oldaddress)){
                $used_address = Address::find($oldaddress);
            }else{
                return back()->with('error','this address is not yours');
            }
        } else{
            $used_address =$address->store($request);
        }

        $total = 0;
        foreach ( $cart as $item){
            $total += $item['total'];
        }

        return view('user.orders.create',[
            'address' => $used_address,
            'total'=>$total,
            'user_name'=> $user->first_name." ".$user->last_name,
            'user_email'=> $user->email
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Address $address)
    {
        $user = auth()->user();

        $cart = session()->get('cart');
        if (!$cart){
            return redirect()->route('products')->with('error','nothing to checkout, cart empty');
        }
        $total = 0;
        $items = 0;
        foreach ( $cart as $item){
            $total += $item['total'];
            $items += $item['quantity'];
        }

        $order = Order::create([
            'user_id'=>$user->id,
            'address_id'=>$address->id,
            'status'=>'1',
            'items'=>$items,
            'total'=> $total,
        ]);

        foreach($cart as $item){
            $orderProduct = [
                'order_id'=>$order->id,
                'product_id'=>$item['product']->id,
                'quantity'=>$item['quantity'],
                'price_when_ordered'=>$item['product']->price
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
        $products_raw = OrderHasProduct::select('product_id')->where('order_id',$order->id)->get();
        $list =[];
        foreach($products_raw as $product){
            $list[]= $product['product_id'];
        }
        $products = Product::withTrashed()->whereIn('id',$list)->get();
        // dd($products);
        return view('user.orders.show',[
            'order'=>$order,
            'products'=>$products,
            'status' => Order::$ORDER_STATUSES[$order->status],
            'status_color' =>Order::$ORDER_STATUS_COLOR[$order->status] ,
            'bg_colour'=>' bg-gray-100 '
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


    public function cancel(){

    }
}
