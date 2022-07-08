@extends('layouts.main')
@section('content')

@php
    $cart = session()->get('cart');
    $total = 0;
    $items = 0;

@endphp
<!-- cart -->
<section class="pt-36  ">
    @if($cart)
    <div class="container mx-auto p-6 bg-white ">
        <h1 class="font-bold text-4xl text-center p-6">Shopping Cart</h1>
        <table class="w-full text-left">
            <thead class="border-b">
                <tr>
                <th class="w-1/2">Products</th>
                <th class="w-1/4">Quantity</th>
                <th class="w-1/4">Subtotal</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cart as $cartItem)
                @php
                    $product = $cartItem['product'];
                    $id = $product->id;
                    $quantity = $cart[$id]['quantity'] ?? 0;
                    $subtotal = $cart[$id]['total'];
                    $items+= $cart[$id]['quantity'];
                @endphp
                <tr class="border-b h-36">
                    <td class="flex h-36 p-3 flex-col md:flex-row items-start ">
                        <img
                        src="{{$product->image->image_url}}"
                        class ="h-full">
                        <div class="flex flex-col justify-center space-y-2">
                            <p class="font-bold hidden sm:block">{{$product->name}}</p>
                            <p>Price: ${{$product->price}} </p>

                        </div>

                    </td>
                    <td >
                        <div class="flex flex-col md:flex-row  ">

                        <!-- modify -->
                        <form action="{{route('modify-cart',['product'=>$id])}}"
                            method="POST"
                            class="md:w-1/2 flex justify-end space-x-2">
                            @csrf
                            <input class="p-2 w-16 text-center  outline-orange-400 border-2 my-1
                            rounded-sm shadow" {{$total == 0 ? " autofocus ":""}}
                            type="number" name="quantity" id="quantity " value="{{$quantity}}" min="0">
                            <button class="bg-blue-500 text-white  px-3 py-2 w-20 my-1
                            hover:bg-blue-300">Modify</button>
                        </form>
                        <!-- remove -->
                        <form action="{{route('delete-from-cart',['product'=>$id])}}"
                            class=" flex justify-end " method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-2 ml-1 my-1
                            hover:bg-red-300">Remove</button>
                        </form>
                        </div>
                    </td>
                    <td>
                        ${{$subtotal}}
                    </td>
                </tr>
                @php
                // this was up there but moved here to help the auto focus
                //  be triggered on the first modify input
                $total += $subtotal;

                @endphp
                @endforeach




            </tbody>
        </table>

    </div>
    <div class="flex justify-end container my-10">
        <div class=" p-6 bg-white">
            <p class="text-xl py-2">Items : <span class="font-bold">{{$items}}</span></p>
            <p class="text-xl py-2 mb-2">Total : <span class="font-bold">${{$total}}</span></p>
            <a href="{{route('checkout')}}" class="rounded bg-orange-500 py-2 px-4
             text-white hover:bg-orange-300">
             Proceed to Checkout</a>
        </div>
    </div>

    @else
    <div class="flex flex-col items-center container bg-white mx-auto mb-10 mt sm:-mt-10 p-4">
        <img src="{{asset('storage/images/empty-cart.png')}}" alt=""
        style="filter: invert(43%) sepia(98%) saturate(763%) hue-rotate(351deg) brightness(99%) contrast(97%);"
        class="w-2/3 lg:w-1/3"
        >
        <p class=" text-xl md:text-5xl mb-10">Cart is empty</p>
        <a href="{{route('products')}}" class="rounded bg-orange-500 text-white px-4 py-2 text-lg">
            Check our products!
        </a>
    </div>



    @endif
    </section>





@endsection


