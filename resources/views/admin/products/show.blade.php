@extends('layouts.admin')
@section('content')

<div class="container flex items-center  mx-auto p-6 justify-evenly">
    <div class=" w-1/4 flex justify-end">
        <img src="{{asset( $product->image->image_url)}}" alt="">
    </div>
    <div class="flex flex-col text-center md:text-left w-1/3">
        <h1 class="text-3xl  font-bold">
            {{$product->name}}
        </h1>
        <p class="">{{$product->description}} </p>

        <div class="flex justify-center my-6 space-x-4">

        </div>
    </div>
</div>
<div class="flex p-2 border-solid justify-center space-x-4">
    <a href="{{ route('admin.edit-product', ['product'=>$product->id]) }}" class="px-3 py-1 rounded bg-green-500 text-white hover:bg-green-300">
        Edit
    </a>
    <form method="POST" action="{{ route('admin.destroy-product', ['product'=>$product->id]) }}">
        @csrf
        @method('DELETE')
        <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-300">Delete</button>
    </form>

</div>



@endsection
