@extends('layouts.main')
@section('content')
<div class="container flex flex-col mx-auto p-4 space-y-4">
    <div class=" bg-gray-200 w-1/2 mx-auto justify-between p-3 rounded flex space-x-3">
        <div class="p-2">
            <h3 class="font-bold text-lg">Order Number</h3>
        </div>
        <div class="p-2">
            <h3 class="font-bold text-lg">Total</h3>
        </div>
        <div class="p-2">
            <h3 class="font-bold text-lg">Status</h3>
        </div>
        <div class="p-2">
            <h3 class="font-bold text-lg">Order ID</h3>
        </div>
    </div>
@foreach ($orders as $number => $order)
<a href="{{ route('single-order', ['order'=>$order->id]) }}">
<div class="w-1/2 bg-gray-100 hover:outline-dashed hover:cursor-pointer mx-auto justify-between p-3 rounded flex space-x-3">
    <div class="p-2">
        <h3 class="font-bold text-lg">{{$number +1 }}</h3>
    </div>
    <div class="p-2">
        <h3 class="font-bold text-lg">{{$order->total }}</h3>
    </div>
    <div class="p-2">
        <h3 class="font-bold text-lg">{{$statuses[$order->status]  }}</h3>
    </div>
    <div class="p-2">
        <h3 class="font-bold text-lg">{{$order->id }}</h3>
    </div>
</div>
</a>
@endforeach

</div>

@endsection
