@extends('layouts.admin')
@section('content')

<div class="flex">
    {{-- left --}}
    <div class=" w-1/2 flex flex-col p-2 border-solid justify-around items-center space-x-4">
        <h1 class="font-bold text-2xl underline-offset-1 text-center mb-10">{{$subcategory->name}} </h1>
        <div class="flex">

        <a href="{{ route('admin.edit-subcategory', ['subcategory'=>$subcategory->id]) }}" class="px-3 py-1 rounded bg-green-500 text-white hover:bg-green-300">
            Edit
        </a>
        <form method="POST" action="{{ route('admin.destroy-subcategory', ['subcategory'=>$subcategory->id]) }}">
            @csrf
            @method('DELETE')
            {{-- <input type="hidden" name="name"> --}}
            <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-300">Delete</button>
        </form>
    </div>

    </div>
        {{-- right --}}
        <ul class="border-solid border-2 w-1/4 h-min">
            <p class="text-l font-bold text-center">categories</p>
            @foreach ($subcategory->categories as $category)
            <li>--->{{$category->name}} </li>
            @endforeach
        </ul>
</div>

<div class="container mx-auto flex flex-wrap  justify-center  mb-10">

    <div class="flex space-x-2 space-y-2 flex-wrap w-3/5 justify-center">
    <p class="text-l font-bold text-center w-full">Products</p>
    @forelse ($products as $product)
        <div class="flex flex-col items-center p-2 justify-center rounded border-solid border-2 w-1/4 h-36">
            <a class="h-2/3 flex flex-col items-center" href="{{route('admin.show', ['product'=>$product->id])}}">
            <img class="h-2/3" src="{{asset($product->image->image_url)}}" alt="">
            <p class="text-bold text-sm">{{$product->name}}</p>
            </a>
            <form method="POST" action="{{ route('unlink-product-subcategory', ['subcategory'=>$subcategory->id,'product'=>$product->id]) }}">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" name="name"> --}}
                <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-300">Delete</button>
            </form>
        </div>
    @empty
        <h2 class="text-3xl text-center font-bold">
            No products were added to this subcategory yet !
        </h2>
    @endforelse
    </div>
    <div class="flex items-stretch">
        {{$products->links()}}
    </div>

</div>
@endsection
