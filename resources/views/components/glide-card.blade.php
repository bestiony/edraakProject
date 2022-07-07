@props(['product'])

<li class="glide__slide">
    <div class="flex flex-col items-center md:flex-row md:max-h-96 justify-center p-6">
        <!-- left -->
        <img src="{{asset($product->image->image_url)}}" class="max-h-72 md:max-w-1/4">
        <!-- right -->
        <div class="flex flex-col p-6 items-start md:w-1/3 text-center md:text-left">
            <h2 class="text-4xl font-bold md:w-1/2">
                {{$product->name}}
            </h2>
            <hr class=" my-6 md:w-1/2">
            <p class="text-sm my-2">
                {{$product->description}}
            </p>
            <a href="{{route('single-product',['product'=>$product->id])}}" class="bg-orange-500 hover:bg-orange-400 text-white py-2 px-4 rounded-lg self-end">
                <i class="fa fa-external-link" aria-hidden="true"></i>
                Shop
            </a>
        </div>
    </div>
</li>
