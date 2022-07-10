@props(['product'])
<div class="flex flex-col p-3 w-1/2 md:w-1/5 h-96 border
            overflow-hidden justify-end m-4
            shadow-md hover:-translate-y-2 duration-300">

    <a class="flex flex-col h-full justify-end"
    href="
    @if(Auth::guard('admin')->check())
    {{ route('admin.show', ['product'=>$product->id]) }}
    @else
    {{route('single-product',['product'=>$product->id])}}
    @endif
    ">
    <img class="max-h-64 self-center" src="{{asset($product->image->image_url)}}" alt="">
    <h4 class="font-bold text-xl ">
        {{$product->name}}
    </h4>
    </a>

    <p class="text-ellipsis overflow-hidden h-6">{{$product->description}}</p>
    <p class="font-bold text-lg"> $ {{$product->price}} </p>

    @if(!Auth::guard('admin')->check())
    <form class="relative h-5"
    action="{{route('add-to-cart',['product'=>$product->id])}}" method="POST">
        @csrf
        <button  class="absolute right-0 bottom-0 hover:text-orange-500 ">
            <i class="fa fa-cart-plus text-4xl " aria-hidden="true"></i>
        </button>
    </form>
    @endif
</div>
