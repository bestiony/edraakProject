@extends('layouts.admin')
@section('content')

<div class="contrainer w-full items-start mx-auto flex flex-row p-3 m-3 justify-between">
    <div class="p-3 flex justify-center">
        <form action="" class="flex">
            <h3 class="font-bold p-1">sort by</h3>
            <label for="category"></label>
            <select name="category" id="">
                <option value="1">Men</option>
            </select>
            <label for="subcategory"></label>
            <select name="subcategory" id="">
                <option value="1">Shoes</option>

            </select>
        </form>
    </div>
    <a href="{{ route('admin.create-product') }} " class="p-3 mr-0 text-white rounded bg-blue-500 hover:bg-blue-300">+ add product</a>
</div>
<div class="container flex flex-wrap mx-auto p-4 justify-center">

    @forelse ($products as $product)
    <x-product-card :product="$product" />
    @empty
    <h1>nothing to see here </h1>
    @endforelse



    {{$products->links()}}

</div>
@endsection
@section('js')
    <x-confirm-message-script/>
@endsection
