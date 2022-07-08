@props(['category'])

<div class="p-3 w-1/2 md:w-1/4 h-96 flex flex-col
            items-center justify-end shadow-md
            hover:scale-110 duration-500 hover:border-orange-500 border rounded">
    <img src="{{asset($category->image->image_url)}}" class="h-5/6">
    <a href="{{route('products')}}/?category={{$category->id}}" class="text-xl hover:text-orange-500 cursor-pointer md:text-4xl text-center font-bold">
        {{$category->name}}
    </a>
</div>
