@extends('layouts.admin')
@section('content')


<h2 class="text-2xl text-center">Categories</h2>
<div class="container space-x-3 flex flex-wrap mx-auto p-4 justify-center items-stretch">
    @forelse ($categories as $category)
    <x-category-card :category="$category" />
    @empty
    <h1>nothing to see here </h1>
    @endforelse



    {{$categories->links()}}

</div>
<div class="contrainer w-full items-start mx-auto flex flex-row p-3 m-3 justify-center">
    <form method="POST" action="{{route('admin.store-category')}} "
    class=" p-3 rounded items-start  border-solid border
    border-red-300 md:w-3/4 space-y-3 flex flex-col md:flex-row justify-between"
    enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col">

        <h1 class="font-bold text-2xl text-center md:text-left mb-4">Add New category</h1>
        <label for="name" class="text-xl w-max">Name</label>
        <input type="text" name="name" id="name"
        class="rounded border w-full p-2 my-2" required
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

        <label for="subcategories" class="text-xl w-max">SubCategories</label>
        <div class="flex flex-wrap items-start justify-start">
            @forelse ($subcategories as $subcategory)
            <div class="flex p-3 ">
            <label class="mr-3" for="{{$subcategory->name}} ">
                {{$subcategory->name}}
            </label>
            <input value="{{$subcategory->id}}" type="checkbox" name="subcategories[]" id="{{$subcategory->name}}">
            </div>
            @empty
            <h2 class="text-xl font-bold p-8 text-center">
                You Don't Have Any categories Yet !
            </h2>
            @endforelse
        </div>

        @error('subcategories')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <button class="roudned bg-green-400 px-3 py-1 text-white hover:bg-green-300">Add </button>
        </div>

    </form>
</div>
@endsection
@section('js')
    <x-confirm-message-script/>
@endsection
