@extends('layouts.main')
@section('content')
<a href="/products" class="rounded bg-red-500 text-white hover:bg-red-200">back</a>
    @if($product)
        <div class="container flex flex-col items-center mx-auto p-6">
            <div class="">
                <img src="{{$product->image->image_url}}" alt="">
            </div>
            <div class="flex flex-col w-1/2">
                <h1 class="text-3xl text-center font-bold">
                    {{$product->name}}
                </h1>
                <p class="">{{$product->description}} </p>

            </div>
        </div>

    @endif
@endsection

