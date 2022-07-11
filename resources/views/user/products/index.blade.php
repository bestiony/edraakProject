@extends('layouts.main')
@section('content')
<!-- top -->

<section class="pt-32 pb-8">

    <!-- filters -->
    <div class="container sm:w-1/2 lg:w-full  flex flex-col
    lg:flex-row mx-auto py-6 rounded border justify-center">
    <h3 class="font-bold text-lg mx-4">
        Filters
    </h3>
        <!-- category -->
        <form action="{{route('products')}}"
        class="border mx-4 lg:w-1/5 flex justify-start items-center">
        @forelse (request()->query() as $key => $value)
            @if ($key == 'category' )
                @continue
            @endif
            <input type="hidden" name="{{$key}}" value="{{$value}}">
        @empty

        @endforelse
        <label class="p-1" for="category">Category :</label>
            <select
            class="lg:w-1/2 p-1"
            name="category" id="category" onchange="this.form.submit()">
                <option value="">all</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </form>

        <!-- Subcategory -->
        <form action="{{route('products')}}"
        class="border mx-4 lg:w-1/5 flex justify-start items-center">
        @forelse (request()->query() as $key => $value)
            @if ($key == 'subcategory' )
                @continue
            @endif
            <input type="hidden" name="{{$key}}" value="{{$value}}">
        @empty

        @endforelse
        <label class="p-1 lg:w-3/5" for="subcategory">Subcategory :</label>
            <select
            class="md:w-1/3 p-1"
            name="subcategory" id="subcategory" onchange="this.form.submit()">
                <option value="">all</option>
                @foreach ($subcategories as $subcategory)

                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>

                @endforeach

            </select>
        </form>
        <!-- size -->
        <form action="{{route('products')}}"
        class="border mx-4  lg:w-1/6 flex items-center">
        @forelse (request()->query() as $key => $value)
                @if ($key == 'size' )
                    @continue
                @endif
            <input type="hidden" name="{{$key}}" value="{{$value}}">
        @empty

        @endforelse
        <label class="p-1" for="size">Size :</label>
            <select
            class="w-auto p-1"
            name="size" id="size" onchange="this.form.submit()">
                <option value="">all</option>
                @foreach ($sizes as $id=> $size)

                <option value="{{$id}}">{{$size}}</option>
                @endforeach
            </select>
        </form>

        <!-- price -->
        <form action="{{route('products')}}"
        class="border mx-4 lg:w-1/5 flex space-x-3 items-center p-2">
        @forelse (request()->query() as $key => $value)
            @if ($key == 'min' || $key=='max')
                @continue
            @endif
            <input type="hidden" name="{{$key}}" value="{{$value}}">
        @empty

        @endforelse
        <input placeholder=" min"
            class="px-1 text-center shadow-inner w-14" type="number"
            name="min" id="min">
        <input placeholder=" max"
            class="px-1 text-center shadow-inner w-14" type="number"
            name="max" id="max">
        <button class="rounded px-2 py-1 border-white border hover:border-orange-400 hover:text-orange-500 hover:border">filter price</button>
        </form>
    </div>



</section>

<!-- products -->
<section>
    <!-- sort by -->
    <!-- products -->
    <div class="container mx-auto py-6 flex flex-col md:flex-row
    justify-center items-center flex-wrap ">
        <!-- product card -->

        @forelse ($products as $product)
        <x-product-card :product="$product"/>
        @empty
        <h1 class="text-3xl md:w-1/3 text-center h-96 leading-10">
            <i class="fa fa-meh-o fa-5x" aria-hidden="true"></i><br>
            Oops we can't find the products that match your
            @if (request()->has('search'))
            search
            @else
            filters!
            @endif
        </h1>
        @endforelse

    </div>
</section>
<div class="container mx-auto">
    {{$products->withQueryString()->links()}}
</div>
@endsection
