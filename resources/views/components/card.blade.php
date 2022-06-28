@props(['product'])
<div class="w-1/4">
    <div class="w-1/2">
        <img src="{{$product->image->image_url}}" alt="">
    </div>
    <div class="flex flex-col w-1/2">
        <a href="/product/{{$product->id}} "><h1 class="text-3xl text-center font-bold">
            {{$product->name}}
        </h1></a>
        <p>{{$product->price}} </p>
    </div>
</div>
