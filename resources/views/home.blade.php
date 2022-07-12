@extends('layouts.main')
@section('content')
 <!-- carousel -->
 <section class="bg-gray-900 mt-30 py-10">
    <div class="container mx-auto p-6 mt-20 bg-white">
        <div class="glide">
            <div class="glide__track border" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($products as $product)
                        <x-glide-card :product="$product"/>
                    @endforeach

              </ul>
            </div>
            <div class="glide__arrows " data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left bg-gray-500" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right bg-gray-500" data-glide-dir=">">next</button>
              </div>
          </div>
    </div>
</section>
<!-- categories -->
<h1 class="text-4xl text-center text-orange-500">
    Categories
</h1>
<hr class="w-40 border-orange-500 mx-auto my-4">
<section>
    <div class=" container justify-center items-center flex-col md:flex-row mx-auto md:flex-wrap flex md:space-x-4 p-6">
        <!-- category card -->
        @foreach ($categories as $category)
        <x-category-card :category="$category"/>
        @endforeach
    </div>
</section>
        <!-- Subcategories -->
<h1 class="text-4xl text-center text-orange-500">
    Subcategories
</h1>
<hr class="w-40 border-orange-500 mx-auto my-4">

<section>
    <div class=" container justify-center flex-col md:flex-row mx-auto flex space-x-4 p-6">
        @foreach ($subcategories as $subcategory)

        <x-subcategory-card :subcategory="$subcategory"/>
        @endforeach

    </div>
</section>


<!-- Deal -->
<section class="bg-black p-6">
    <div class="container bg-white mx-auto">

        <div class="container mx-auto p-6 flex flex-col md:flex-row justify-center items-center">
            <!-- left -->
            <img src="{{asset($random->image->image_url)}}" class="w-auto max-h-96">
            <div class="flex flex-col items-center space-y-3">
                <h1 class="text-5xl font-bold text-orange-500">%50 OFF</h1>
                <h2 class="text-xl md:text-4xl text-center font-bold md:w-1/2">
                    Get the Best Deals this Aid
                </h2>
                <a href="{{route('single-product',['product'=>$random->id])}}" class="bg-orange-500 hover:bg-orange-400 text-white py-2 px-4 rounded-lg ">
                    <i class="fa fa-external-link" aria-hidden="true"></i>
                    Shop
                </a>
            </div>
        </div>
    </div>
</section>


<!-- brands -->
<section class="my-10">
    <h1 class="text-4xl text-center text-black">
        Brands
    </h1>
    <hr class="w-40 border-black mx-auto my-4">

    <div class="container flex flex-wrap  items-center  mx-auto p-6 justify-center space-x-6">
        <a target="_blank" class="w-1/3 md:w-1/5" href="                       "><img src="{{asset('storage/images/brands/mastor.jpg')}}" class=" hover:shadow-2xl duration-500"></a>
        <a target="_blank" class="w-1/3 md:w-1/5" href="https://darcollective.com/"><img src="{{asset('storage/images/brands/dar.png')}}" class=" hover:shadow-2xl duration-500"></a>
        <a target="_blank" class="w-1/3 md:w-1/5" href="https://www.emir-store.com/"><img src="{{asset('storage/images/brands/emir.png')}}" class=" hover:shadow-2xl duration-500"></a>
        <a target="_blank" class="w-1/3 md:w-1/5" href="https://tuniqoasis.com/"><img src="{{asset('storage/images/brands/TUNIQ.png')}}" class=" hover:shadow-2xl duration-500"></a>
    </div>
</section>



@endsection

@section('js')
<!-- glide js -->
<script src="https://unpkg.com/@glidejs/glide@3.5.2/dist/glide.min.js"></script>
<script>
    new Glide('.glide',{
        // autoplay: 2000,
        // hoverpause: false,
        // perView: 1
    }).mount()
</script>
@endsection
