@extends('layouts.main')
@section('content')
{{-- Top --}}
<section class="mt-40">

<div class="container flex flex-col items-center md:items-start lg:flex-row flex-wrap mx-auto ">
    {{-- left --}}
    <div class="m-8 items-center pt-4 flex flex-col p-3 w-3/4 lg:w-1/4 rounded-l bg-white">
        <img
            src="https://i.ibb.co/rMhVXF5/cover3.jpg"
            alt=""
            class="w-1/2 rounded-full outline-2 outline outline-orange-200 p-2">
        <hr class="my-4 border-1 border-gray-200 w-full">
        {{-- contact --}}
        <p class="text-l">
            {{$user->first_name.' '.$user->last_name}}
        </p>
        <p class="text-sm">
            {{$user->email}}
        </p>
        <hr class="my-4 border-1 border-gray-200 w-full">
        {{-- address --}}
        <p class="text-l">Addresses</p>
        @php
        $count = 1;
        @endphp
            @forelse ($user->addresses as $address)
                <p class="rounded p-2 text-sm shadow-md w-full">
                    <span class="text-white bg-red-500 w-6 p-1 h-6 inline-block leading-3 text-center
                        rounded-full  text-l ">

                        {{$count++}}
                    </span>
                    {{
                    $address->address_line_1.' '.
                    $address->address_line_2.' '.
                    $address->city.' '.
                    $address->state.' '.
                    $address->country.' '.
                    $address->postal_code
                    }}
                </p>
            @empty
                <p class="text-sm text-red-500">No addresses yet</p>
            @endforelse



    </div>
    {{-- right --}}
    <div class=" sm:m-8 items-center pt-4 flex flex-col sm:p-3 w-max lg:w-3/5 rounded-l bg-white">
        <h3 class="text-xl font-bold">Customer Orders</h3>
        <table class="w-full  border-spacing-2 border-separate ">
            <thead class="text-left bg-gray-50">
                <tr>
                    <th>Order ID</th>
                    <th class="hidden lg:table-cell">Created at</th>
                    <th class="hidden lg:table-cell">Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->orders as $order)

                <tr class=" border-black rounded-md text-sm">
                    <td class="py-3 px-6" >{{$order->id}} </td>
                    <td class="py-3 px-6 hidden  lg:table-cell">{{$order->created_at}} </td>
                    <td class="py-3 px-6 hidden  lg:table-cell">{{$order->items}} </td>
                    <td class="py-3 px-6">{{$order->total}} </td>
                    <td class="py-3 px-6">{{$statuses[$order->status]}} </td>
                    <td><a href="{{ route('single-order', ['order'=>$order->id]) }}"
                        class="rounded bg-orange-500 text-white hover:bg-orange-300
                        py-2 px-4 text-sm">Details</a></td>
                </tr>
            </a>
        </tbody>
    </table>
                @empty
            </tbody>
        </table>
                <p class="text-sm text-red-500 text-center p-8">No orders yet</p>
                @endforelse


    </div>
</div>

</section>

@endsection
