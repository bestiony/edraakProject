@props(['product'])

<div class="flex md:w-1/4 sm:1/2 m-2 h-auto  p-2 items-start rounded border-2 border-solid border-gray-200">
    <img src="{{asset('storage/'.$product->image->image_url)}}" alt="" class="h-52">
    <div class="flex flex-col w-32">
        <a href="{{ route('admin.show', ['product'=>$product->id]) }}">
        <h4 class="text-xl">
            {{$product->name}}
        </h4>
    </a>
        <p class="overflow-hidden text-ellipsis h-40">
            {{$product->description}}
        </p>
        <p class="">${{$product->price}}  </p>
    </div>
</div>

