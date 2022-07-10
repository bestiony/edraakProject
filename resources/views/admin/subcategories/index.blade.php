@extends('layouts.admin')
@section('content')


<div class="container  flex flex-wrap mx-auto p-4 justify-center items-stretch">

    @forelse ($subcategories as $subcategory)
    <x-subcategory-card :subcategory="$subcategory" />
    @empty
    <h1>nothing to see here </h1>
    @endforelse



    {{$categories->links()}}

</div>
<div class="contrainer w-full items-start mx-auto flex flex-row p-3 m-3 justify-center">
    <form method="POST" action="{{route('admin.store-subcategory')}} "
    class=" p-3 rounded items-start  border-solid border
    border-red-300 md:w-3/4 space-y-3 flex flex-col md:flex-row justify-between"
    enctype="multipart/form-data">
        @csrf
        <div>

        <h1 class="font-bold text-2xl text-center md:text-left mb-4">Add New Subcategory</h1>
        <label for="name" class="text-xl w-max">Name</label>
        <input type="text" name="name" id="name"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{old('name')}}">
        @error('name')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <label for="image">Add Image</label>
        <input class="border p-2" type="file" name="image" id="image" required >
        @error('image')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        </div>
        <div class="w-1/2">

        <label for="subcategories" class="text-xl w-max">categories</label>
        <div class="flex flex-wrap items-start justify-start">
            @foreach ($categories as $category)
            <div class="flex p-3 ">
            <label class="mr-3" for="{{$category->name}} ">
                {{$category->name}}
            </label>
            <input value="{{$category->id}}" type="checkbox" name="categories[]" id="{{$category->name}}">
            </div>
            @endforeach
        </div>

        @error('categories')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <button class="roudned bg-green-400 px-3 py-1 text-white hover:bg-green-300">Add </button>
        </div>

    </form>
</div>
@endsection
