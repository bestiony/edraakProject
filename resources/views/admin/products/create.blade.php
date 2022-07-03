@extends('layouts.admin')
@section('content')

<div class="container mx-auto flex  justify-center  mb-10">
    <form method="POST" action="{{route('admin.store-product')}} " class="p-3 rounded items-start  border-solid border
    border-red-300 md:w-1/3 space-y-3 flex flex-col "
    enctype="multipart/form-data">
        @csrf
        <h1 class="font-bold text-2xl text-center">Add New Product</h1>
        <label for="name" class="text-xl w-max">Name</label>
        <input type="text" name="name" id="name"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('name')}}">
        @error('name')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="description" class="text-xl w-max">Description</label>
        <textarea type="text" name="description" id="description"
        class="resize-none rounded shadow-inner w-full p-2 my-2" required
        value="{{old('description')}}">

        </textarea>
        @error('description')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror


        <label for="price" class="text-xl w-max">Price</label>
        <input min="0" type="number" name="price" id="price"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('price')}}">
        @error('price')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="size" class="text-xl w-max">Size</label>
        <select  name="size" id="size"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('size')}}">
            @foreach ($sizes as $size)
                <option value="{{$size}}">{{$size}}</option>
            @endforeach
        </select>
        @error('size')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="category_id" class="text-xl w-max">Category</label>
        <select type="text" name="category_id" id="category_id"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('category')}}">
            @foreach ($categories as $category)
                <option value="{{$category->id}} ">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="subcategories" class="text-xl w-max">SubCategory</label>
        <div class="flex flex-wrap items-start justify-start">
            @foreach ($subcategories as $subcategory)
            <div class="flex p-3 ">
            <label class="mr-3" for="{{$id =  $subcategory->id}} ">
                {{$subcategory->name}}
            </label>
            <input type="checkbox" name="subcategories[]"
            value="{{$id}}" id="{{$id}}">
            </div>
            @endforeach
        </div>
        {{-- <select type="text" name="subcategories" id=""
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('sybcategory')}}">
            @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}} ">{{$subcategory->name}}</option>
            @endforeach
        </select> --}}
        @error('subcategories')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="image" class="text-xl w-max">Image</label>
        <input type="file" name="image" id="image"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('image')}}">
        @error('image')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="return_policy_id" class="text-xl w-max">Return Policy</label>
        <select type="text" name="return_policy_id" id="return_policy_id"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('return_policy_id')}}">
            @foreach ($return_policies as $policy)
                <option value="{{$policy->id}} ">{{$policy->description}}</option>
            @endforeach
        </select>
        @error('return_policy_id')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <button class="roudned bg-green-400 px-3 py-1 text-white hover:bg-green-300">Add Product</button>
        <a href="{{ route('admin.products')}} " class="rounded bg-red-500 px-3 py-1 text-white">Back</a>

    </form>
</div>


@endsection
