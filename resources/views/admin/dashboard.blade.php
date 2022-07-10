@extends('layouts.admin')
@section('content')
    <h2 class="font-bold text-2xl text-center m-4">Admin Dashboard</h2>
    <div class="flex flex-col md:flex-row md:flex-wrap justify-center items-center">
        {{-- item 1 --}}
        <div class="p-6 border shadow-md border-b-orange-500 border-b-8 w-4/5 md:w-1/3 m-4 text-3xl text-center">
            <p>
                Users
            </p>
            <p class="font-bold">{{$users}}</p>
        </div>

        {{-- item 2 --}}
        <div class="p-6 border border-b-red-500 border-b-8 w-4/5 md:w-1/3 m-4 text-3xl text-center">
            <p>
                Orders
            </p>
            <p class="font-bold">{{$orders}}</p>
        </div>

        {{-- item 1 --}}
        <div class="p-6 border border-b-blue-500 border-b-8 w-4/5 md:w-1/3 m-4 text-3xl text-center">
            <p>
                Products
            </p>
            <p class="font-bold">{{$products}}</p>
        </div>

        {{-- item 1 --}}
        <div class="p-6 border border-b-green-500 border-b-8 w-4/5 md:w-1/3 m-4 text-3xl text-center">
            <p>
                Sales this Month
            </p>
            <p class="font-bold">$ {{$sales}}</p>
        </div>

    </div>

@endsection
