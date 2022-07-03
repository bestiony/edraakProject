@extends('layouts.admin')
@section('content')

<div class="container mx-auto flex  justify-center  mb-10">
    <form method="POST" action="{{route('admin.update-category',['category'=>$category->id])}} "
    class=" p-3 rounded items-start  border-solid border
    border-red-300 md:w-3/4 space-y-3 flex flex-col md:flex-row justify-between">
        @csrf
        @method('PUT')
        <div>

        <h1 class="font-bold text-2xl text-center md:text-left mb-4">Edit category</h1>
        <label for="name" class="text-xl w-max">Name</label>
        <input type="text" name="name" id="name"
        class="rounded shadow-inner w-full p-2 my-2" required
        value="{{$category->name}}">
        @error('name')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        </div>
        <div class="w-1/2">

            <label for="subcategories" class="text-l w-max">SubCategory</label>
            <div class="flex flex-wrap items-start justify-start">

                @foreach ($subcategories as $subcategory)
                <div class="flex p-3 ">
                <label class="mr-3" for="{{$id =  $subcategory->id}} ">
                    {{$subcategory->name}}
                </label>

                <input type="checkbox" name="subcategories[]"
                value="{{$id}}" id="{{$id}}" {{
                    $category->subcategories->has($id)? 'checked':''
                }}
                >
                </div>
                @endforeach
        @error('subcategories')
            <p class="text-red-400 text-sm">{{$message}} </p>
        @enderror
        <button class="roudned bg-green-400 px-3 py-1 text-white hover:bg-green-300">Add </button>
        </div>

    </form>
</div>


@endsection
