@extends('layouts.main')
@section('content')
@php
$cart = session()->get('cart') ;
// dd($cart);

@endphp
<div class="container mx-auto flex flex-col">
    @if($cart)
    @foreach($cart as $cartItem)
    @php
        $product = $cartItem['product'];
        $id = $product->id;
        $quantity = $cart[$id]['quantity'] ?? 0;
    @endphp
    <div class="flex p-4 m-4">
        <h3>product name</h3>
        <h3>{{$cartItem['product']->name}}</h3>
        <h3>quantity</h3>
        <h3>{{$cartItem['quantity']}}</h3>
        <h3>total</h3>
        <h3>{{$cartItem['total']}}</h3>
        <form method="POST" action="{{route('modify-cart',['product'=>$id])}}">
            @csrf
            <input type="number" name="quantity" id="" value="{{$quantity}}">
            <button class="p-3 px-4 rounded bg-blue-500 text-white hover:bg-blue-300">
                * modify<i class="fa fa-cart-plus" aria-hidden="true"></i>
            </button>
        </form>
        <form method="POST" action="{{route('delete-from-cart',['product'=>$id])}}">
            @csrf
            @method('DELETE')
            <button class="p-3 px-4 rounded bg-red-500 text-white hover:bg-red-300">
                * Remove<i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </form>

    </div>
    @endforeach
</div>
<a href="{{route('checkout')}}" class="rounded bg-green-500 text-white hover:bg-green-300">Proceed to Checkout</a>
    @else
    <h1>Cart Empty</h1>
    @endif


@endsection
