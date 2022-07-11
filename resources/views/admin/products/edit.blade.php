@extends('layouts.admin')
@section('content')

<div class="container mx-auto flex  justify-center  mb-10">
    <form method="POST" action="{{route('admin.update-product',['product'=>$product])}} "
        class="p-3 rounded items-start  border-solid border
    border-red-300  flex flex-col md:flex-row bg-gray-50"
    enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- left --}}
        <div class="flex-col flex space-y-3 w-1/2 p-3">
        <h1 class="font-bold text-2xl text-center">Edit Product</h1>
        <label for="name" class="text-l w-max">Name</label>
        <input type="text" name="name" id="name"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$product->name}}">
        @error('name')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="description" class="text-l w-max">Description</label>
        <textarea type="text" name="description" id="description"
        class="resize-none rounded shadow-inner w-full p-2 my-2" required
        >{{$product->description}}

        </textarea>
        @error('description')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror


        <label for="price" class="text-l w-max">Price</label>
        <input min="0" type="number" name="price" id="price"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$product->price}}">
        @error('price')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="size" class="text-l w-max">Size</label>
        <select  name="size" id="size"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$product->size}}">
            @foreach ($sizes as $key=> $size)
                <option value="{{$size}}" {{
                    $product->size == $key? 'selected':''
                }} >{{$size}}</option>
            @endforeach
        </select>
        @error('size')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="category_id" class="text-l w-max">Category</label>
        <select type="text" name="category_id" id="category_id"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$product->category_id}}">
            @foreach ($categories as $category)
                <option value="{{$category->id}} " {{
                    $product->category_id == $category->id? 'selected':''
                }}>{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        </div>
        {{-- right --}}
        <div class="flex flex-col space-y-3 w-1/2">
        <label for="subcategories" class="text-l w-max">SubCategory</label>
        <div class="flex flex-wrap items-start justify-start">

            @foreach ($subcategories as $subcategory)
            <div class="flex p-3 ">
            <label class="mr-3" for="{{$id =  $subcategory->id}} ">
                {{$subcategory->name}}
            </label>

            <input type="checkbox" name="subcategories[]"
            value="{{$id}}" id="{{$id}}" {{
                $product->subcategories->has($id)? 'checked':''
            }}
            >
            </div>
            @endforeach
        </div>

        @error('subcategories')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror

        <label for="image" class="text-l w-max">Image</label>
        <input type="file" name="image" id="image"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$product->image}}">
        @error('image')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <img src="{{asset('storage/'.$product->image->image_url)}}" alt="">
        <label for="return_policy_id" class="text-l w-max">Return Policy</label>
        <select type="text" name="return_policy_id" id="return_policy_id"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$product->return_policy_id}}">
            @foreach ($return_policies as $policy)
                <option value="{{$policy->id}} "{{
                    $product->return_policy_id == $policy->id? 'selected':''
                }}>{{$policy->description}}</option>
            @endforeach
        </select>
        @error('return_policy_id')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <div class="flex justify-around">

        <button class="roudned bg-green-400 px-3 py-1 text-white hover:bg-green-300">Update Product</button>
        <a href="{{ route('admin.show', ['product'=>$product->id]) }} " class="rounded bg-red-500 px-3 py-1 text-white">Back</a>
        </div>
        </div>
    </form>
</div>


@endsection
