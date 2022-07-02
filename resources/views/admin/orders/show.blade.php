@extends('layouts.admin')
@section('content')
<h1 class="w-1/3 text-center mx-auto font-bold text-4xl">Order Details : ID {{$order->id}}</h1>

<div class="container mx-auto py-3 px-6  border-solid border-gray-500 ">
    {{-- top --}}
    <div class="flex mx-auto justify-around space-x-4 ">
        <div class="border-solid border-gray-500 border-2 rounded p-3">
            <p>Status:</p>
            <h3 class="text-2xl font-bold text-blue-400 rounded border-b-slate-400">{{$status}}</h3>
            <form method="POST" action="{{route('admin.update-order',['order'=>$order->id])}}">
                @csrf
                @method('PUT')
                <select name="status" id="">
                    @foreach($statuses as $key=> $status)
                    <option value="{{$key}}">{{$status}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Update">
            </form>
        </div>
        <div>

            <p class="p-3">
                {{$order->address->address_line_1}}
            </p>
            <p> Created at {{$order->created_at}}</p>
        </div>
    </div>
    <div class="p-4 flex flex-col space-y-4">
        @foreach ($order->products as $product)
            <div class="flex space-x-2 p-2 rounded border-2 border-solid border-gray-200">
                <img src="{{$product->image->image_url}}" alt="" class="w-32">
                <div class="flex flex-col">
                    <h4 class="text-xl">
                        {{$product->name}}
                    </h4>
                    <p>
                        {{$product->description}}
                    </p>
                    <p class="">${{$product->price}}  X   Quantity: {{$quantity = $order->get_product_quantity($product->id)}}</p>
                    <p>Total: ${{$product->price * $quantity}}</p>
                </div>
            </div>
        @endforeach
        <div class="flex justify-between  p-2 rounded border-4 border-solid border-black">
            <div>
                <p>Number of products in order : {{$order->products->count()}} </p>
                <p>Number of items in order : </p>
            </div>
            <div>
                <h4 class="font-bold text-xl">Total: ${{$order->total}}</h4>
            </div>
        </div>
    </div>
</div>



@endsection
