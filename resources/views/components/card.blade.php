@props(['product'])
<div class="justify-center w-1/2 md:w-1/4 h-1/5 block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <div class="h-md">
        <img src="{{$product->image->image_url}}" alt="">
    </div>
    <div class="flex flex-col">
        <a href="/product/{{$product->id}} "><h1 class="text-3xl text-center md:text-left font-bold">
            {{$product->name}}
        </h1></a>
        <p>{{$product->price}} </p>
        <div class="flex justify-center my-6 space-x-4">
            <form method="POST" action="/add-to-cart/{{$product->id}}">
                @csrf
                <button class="p-3 px-4 rounded bg-green-600 text-white hover:bg-green-300">
                    + cart<i class="fa fa-cart-plus" aria-hidden="true"></i>
                </button>
            </form>
            <a href="product/{{$product->id}}/add-to-favorite" class="p-3 px-4 rounded bg-red-600 text-white hover:bg-red-300">
                + favourite<i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
