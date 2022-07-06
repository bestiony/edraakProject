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
        class="border mx-4  lg:w-1/6 flex">

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
        class="border mx-4 lg:w-1/5 flex space-x-3">
        <label class="p-1" for="category">Price :</label>
        <input placeholder=" min"
            class="px-1 text-center shadow-inner w-14" type="number"
            name="min" id="min">
        <input placeholder=" max"
            class="px-1 text-center shadow-inner w-14" type="number"
            name="max" id="max">

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

        @foreach ($products as $product)
        <x-product-card :product="$product"/>
        @endforeach

    </div>
</section>
<div class="container mx-auto">
    {{$products->withQueryString()->links()}}
</div>
@endsection
