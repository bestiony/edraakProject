@extends('layouts.main')
@section('content')
@php
    $items = 0;
@endphp
<section class="mt-40 p-6">
    <div
        class="container mx-auto py-6 flex flex-col md:flex-row space-y-4 md:space-y-0 flex-wrap md:justify-between">
        <!-- top: status -->
        <div class="bg-white mx-5 md:ml-0 p-6 flex items-center  md:w-96">
            <p>Status:</p>
            <h3 class="{{$status_color}} text-xl">{{$status}}</h3>
        </div>
        <!-- middle left : addresss used -->
        <div class="bg-white p-6 flex items-center mx-5 space-x-3 md:w-96">
            <i class="fa fa-address-card-o" aria-hidden="true"></i>
            <p>Address:</p>
            @php
                $address = $order->address;
            @endphp
                <p>
                {{
                $address->address_line_1.' '.
                $address->address_line_2.' '.
                $address->city.' '.
                $address->state.' '.
                $address->country.' '.
                $address->postal_code
                }}</p>
        </div>
        <!-- middle  right: order id and created date -->
        <div class="bg-white p-6 flex mx-5 md:mr-0 flex-col justify-center  md:w-96">
            <p>
                Order id:
                <span class="font-blod">{{$order->id}}</span>
            </p>
            <p>
                Created at:
                <span>{{$order->created_at}} </span>
            </p>
        </div>
    </div>
    <!-- bottom :items  -->
    <div class=" mx-auto flex flex-col  md:w-2/3 bg-white p-6 mt-10">
        <!-- item 1 -->
        @foreach ($products as $product)

        <div class="flex flex-wrap justify-around">
            <img src="{{asset($product->image->image_url)}}" class="h-40 ">
            <div class="flex flex-col p-6 w-4/6">
                <p class="font-bold">{{$product->name}}</p>
                <p class="text-ellipsis overflow-hidden h-12">
                    {{$product->description}}
                </p>
                <div class="flex mt-auto">

                    <p class="">
                        ${{$price = $order->get_product_price_when_ordered($product->id)}} X {{$quantity = $order->get_product_quantity($product->id)}}
                    </p>
                    <p class="ml-auto font-bold">
                        subtotal: ${{$subtotal = $price*$quantity}}
                    </p>
                </div>
            </div>
            <hr class=" w-full" />
        </div>
        @php
            $items += $quantity;
        @endphp
        @endforeach





    </div>
    <!-- bottom left : total  -->
    <div class=" mx-auto flex flex-col items-end  md:w-2/3   mt-10">
        <div class="bg-white p-6 w-56">
            <p class="font-bold">items:{{$items}}</p>
            <p class="font-bold">Total: ${{$order->total}}</p>
        </div>
    </div>
    <!-- <div class="p-6 flex flex-col md:w-2/3 bg-white"></div> -->
</section>
@endsection
