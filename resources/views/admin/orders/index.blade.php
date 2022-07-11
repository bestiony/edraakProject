@extends('layouts.admin')
@section('content')
<div class="container flex flex-col mx-auto p-4 space-y-4">

<div class=" bg-gray-200 w-2/3 mx-auto justify-between p-3 rounded flex space-x-3">
    <div class="p-2">
        <h3 class="font-bold text-lg">User Name</h3>
    </div>
    <div class="p-2">
        <h3 class="font-bold text-lg">items </h3>
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
    <div class="p-2">
        <h3 class="font-bold text-lg">Created at</h3>
    </div>
</div>
    @foreach ($orders as $order)
    <a href="{{ route('admin.single-order', ['order'=>$order->id]) }}">
        <div class="w-2/3 bg-gray-100 hover:outline-dashed hover:cursor-pointer mx-auto justify-between p-3 rounded flex space-x-3">
            <div class="p-2">
                <h3 class="font-bold text-lg">{{$order->user->first_name}}</h3>
            </div>
            <div class="p-2">
                <h3 class="font-bold text-lg">{{$order->items}}</h3>
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
            <div class="p-2">
                <h3 class="font-bold text-lg">{{$order->created_at }}</h3>
            </div>
        </div>
        </a>

    @endforeach
    {{ $orders->links() }}
</div>
@endsection
