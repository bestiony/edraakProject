@extends('layouts.main')
@section('content')


    <!-- product details -->
    <section class="pt-32">
        <div class="container h-screen flex flex-col md:flex-row mx-auto p-6 justify-center ">
            <!-- left -->
            <img class="w-auto max-h-full  self-center md:self-start" src="{{asset($product->image->image_url)}}" alt="">
            <!-- right -->
            <div class="flex flex-col p-6 md:w-1/3 items-start space-y-4">
                <h3 class="font-bold text-3xl">
                    {{$product->name}}
                </h3>
                <table class="w-min">
                    <tr>
                        <td class="font-bold">Size:</td>
                        <td>{{$sizes[$product->size]}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Category:</td>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Subcategories:</td>
                        <td>
                            @foreach ($product->subcategories as $subcategory)
                                {{$subcategory->name."   "}}
                            @endforeach
                        </td>
                    </tr>
                </table>
                <p class="font-bold text-xl">
                    Price : <span class="text-orange-500">$ {{$product->price}}</span>
                </p>
                <form action="{{route('add-to-cart',['product'=>$product->id])}}" method="POST">
                    @csrf
                <button class="rounded p-2 bg-orange-500 text-white
                hover:bg-orange-400"> Add to cart</button>
                </form>

                <h4 class="font-bold">
                    Description:
                </h4>
                <p class="text-sm">
                    {{$product->description}}
                </p>
                <h4 class="font-bold">
                    Return Policy:
                </h4>
                <p class="text-sm">
                    {{$product->returnPolicy->description}}
                </p>
            </div>
        </div>
    </section>

    <!-- bottom -->
    <div class="container justify-between mx-auto flex p-6">
        <p class="text-xl font-bold">
            Related Products
        </p>
        <a href="{{route('products')}}/?category={{$product->category_id}}" class="text-xl font-bold cursor-pointer hover:text-orange-500">
            view more
        </a>
    </div>
    <section>
        <!--Related products -->

        <div class="container mx-auto py-6 flex flex-wrap md:space-x-3 justify-center">
            <!-- product card -->
            @forelse ($related as $product)
                <x-product-card :product="$product"/>
            @empty
                <p class="my-30 font-bold text-xl text-center text-orange-500">
                    No products in this category yet
                </p>
            @endforelse






        </div>
    </section>





@endsection
