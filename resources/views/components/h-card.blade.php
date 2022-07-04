@props(['product'])

<div class="flex md:w-1/4 1/2 m-2 h-36  p-2 items-center rounded border-2
border-solid border-gray-200">
    <img src="{{asset('storage/'.$product->image->image_url)}}" alt=""
    class="w-1/2">
    <div class="flex flex-col w-1/2 text-ellipsis overflow-hidden">
        <a href="{{ route('admin.show', ['product'=>$product->id]) }}">
        <h4 class="text-xl">
            {{$product->name}}
        </h4>
        </a>
        <p class="overflow-hidden text-ellipsis h-14">
            {{$product->description}}
        </p>
        <p class="">${{$product->price}}  </p>
    </div>
</div>

