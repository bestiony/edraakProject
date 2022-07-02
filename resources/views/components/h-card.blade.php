@props(['product'])

<div class="flex md:w-1/4 sm:1/2 m-2 h-auto  p-2 items-start rounded border-2 border-solid border-gray-200">
    <img src="{{$product->image->image_url}}" alt="" class="h-52">
    <div class="flex flex-col w-32">
        <h4 class="text-xl">
            {{$product->name}}
        </h4>
        <p class="overflow-hidden text-ellipsis h-40">
            {{$product->description}}
        </p>
        <p class="">${{$product->price}}  </p>
    </div>
</div>
