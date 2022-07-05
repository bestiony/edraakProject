@extends('layouts.main')
@section('content')
@php
$cart = session()->get('cart')??[];
// dd($cart);
$id = $product->id;
$quantity = $cart[$id]['quantity'] ?? 0;
@endphp
<a href="/products" class="rounded bg-red-500 text-white hover:bg-red-200">back</a>
    @if($product)
        <div class="container flex items-center  mx-auto p-6 justify-evenly">
            <div class=" w-1/4 flex justify-end">
                <img src="{{$product->image->image_url}}" alt="">
            </div>
            <div class="flex flex-col text-center md:text-left w-1/3">
                <h1 class="text-3xl  font-bold">
                    {{$product->name}}
                </h1>
                <p class="">{{$product->description}} </p>
                <div class="flex justify-center my-6 space-x-4">
                    @if(!array_key_exists($id,$cart))
                    <form method="POST" action="{{route('add-to-cart',['product'=>$id])}}">
                        @csrf
                        <button class="p-3 px-4 rounded bg-green-600 text-white hover:bg-green-300">
                            + cart<i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </button>
                    </form>

                    @else
                    <form method="POST" action="{{route('modify-cart',['product'=>$id])}}">
                        @csrf
                        <input type="number" name="quantity" id="" value="{{$quantity}}">
                        <button class="p-3 px-4 rounded bg-blue-500 text-white hover:bg-blue-300">
                            * modify<i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </button>
                    </form>
                    <form method="POST" action="{{route('delete-from-cart',['product'=>$id])}}">
                        @csrf
                        <button class="p-3 px-4 rounded bg-yellow-500 text-black hover:bg-yellow-300">
                            remove<i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </button>
                    </form>
                    @endif
                    <a href="product/{{$product->id}}/add-to-favorite" class="p-3 px-4 rounded bg-red-600 text-white hover:bg-red-300">
                        + favourite<i class="fa fa-heart-o" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

    @endif
@endsection

