@props(['subcategory'])

<div class="p-3 md:w-1/4 flex flex-col justify-end items-center shadow-md
            hover:-translate-y-4 duration-500 hover:border-orange-500 border rounded">
    <img src="{{asset($subcategory->image->image_url)}}" class="w-3/4 ">
    <a href="{{route('products')}}/?subcategory={{$subcategory->id}}" class="text-xl md:text-lg text-center cursor-pointer hover:text-orange-500 font-bold">
    {{$subcategory->name}}
    </a>
</div>

