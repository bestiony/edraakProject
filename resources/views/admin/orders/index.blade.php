@extends('layouts.admin')
@section('content')
<div class="container flex flex-col mx-auto p-4 space-y-4">
    <h1 class="font-bold text-2xl text-center">
        Orders
    </h1>
    <div class="container  flex flex-col p-3 border-solid border-2 rounded">

<table class="table-fixed border-separate border-spacing-y-2.5">
    <thead class="text-left bg-gray-50 ">
        <tr class="py-10 leading-10">
            <th>Order ID</th>
            <th>User Name</th>
            <th>items</th>
            <th>Total</th>
            <th>Status</th>
            <th>Created at</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
        <tr class="hover:border">
            <td>{{$order->id }}</td>
            <td>{{$order->user->first_name . " ".$order->user->last_name}}</td>
            <td>{{$order->items}}</td>
            <td>{{$order->total}}</td>
            <td>{{$statuses[$order->status]}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                <a
                    href="{{ route('admin.single-order', ['order'=>$order->id]) }}"
                    class="py-2 px-4 w-9 rounded bg-blue-500 text-white hover:bg-blue-300">
                        Details
                </a>
            </td>

        </tr>
    </tbody>
</table>
{{ $orders->links() }}
        @empty
    </tbody>
</table>
            <h2 class="text-xl font-bold p-8 text-center">
                You Don't Have Any Orders Yet !
            </h2>
        @endforelse


</div>




</div>
@endsection
