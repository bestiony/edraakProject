@extends('layouts.main')
@section('content')
 <!-- carousel -->
 <section class="bg-gray-900 py-10">
    <div class="container mx-auto p-6 mt-20 bg-white">
        <div class="glide">
            <div class="glide__track border" data-glide-el="track">
                <ul class="glide__slides">

                <li class="glide__slide">
                    <div class="flex flex-col items-center md:flex-row  justify-center p-6">
                        <!-- left -->
                        <img src="./images/hoodie.jpg" class="md:w-1/4">
                        <!-- right -->
                        <div class="flex flex-col p-6 items-start md:w-1/3 text-center md:text-left">
                            <h2 class="text-4xl font-bold md:w-1/2">
                                The Best Hoodies in Town
                            </h2>
                            <hr class=" my-6 md:w-1/2">
                            <p class="text-sm my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Amet ullam aperiam architecto ex vero ducimus ipsa eligendi quisquam odit alias sunt,
                                voluptates laudantium culpa corrupti, libero saepe esse enim. Exercitationem!</p>
                            <a href="" class="bg-orange-500 hover:bg-orange-400 text-white py-2 px-4 rounded-lg self-end">
                                <i class="fa fa-external-link" aria-hidden="true"></i>
                                Shop
                            </a>
                        </div>
                    </div>
                </li>

                <li class="glide__slide">1</li>
                <li class="glide__slide">2</li>
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
    <div class=" container justify-center flex-col md:flex-row mx-auto flex space-x-4 p-6">
        <!-- category card -->
        <div class="p-3 md:w-1/3 flex flex-col justify-center hover:z-0 items-center shadow-md
            hover:scale-110 duration-500 hover:border-orange-500 border rounded">
            <img src="./images/hoodie.jpg" class="w-3/4">
            <h2 class="text-xl md:text-4xl text-center font-bold">
                Men
            </h2>
        </div>




    </div>
</section>
        <!-- Subcategories -->
<h1 class="text-4xl text-center text-orange-500">
    Subcategories
</h1>
<hr class="w-40 border-orange-500 mx-auto my-4">

<section>
    <div class=" container justify-center flex-col md:flex-row mx-auto flex space-x-4 p-6">
        <div class="p-3 md:w-1/4 flex flex-col justify-center items-center shadow-md
            hover:-translate-y-4 duration-500 hover:border-orange-500 border rounded">
            <img src="./images/hoodie.jpg" class="w-3/4">
            <h2 class="text-xl md:text-4xl text-center font-bold">
                Men
            </h2>
        </div>

    </div>
</section>


<!-- Deal -->
<section class="bg-black p-6">
    <div class="container bg-white mx-auto">

        <div class="container mx-auto p-6 flex flex-col md:flex-row justify-center items-center">
            <!-- left -->
            <img src="./images/men-deal.png" class="md:w-1/3">
            <div class="flex flex-col items-center space-y-3">
                <h1 class="text-5xl font-bold text-orange-500">%50 OFF</h1>
                <h2 class="text-xl md:text-4xl text-center font-bold md:w-1/2">
                    Get the Best Deals this Aid
                </h2>
                <a href="" class="bg-orange-500 hover:bg-orange-400 text-white py-2 px-4 rounded-lg ">
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

<div class="flex flex-col items-center">
    <h1 class="font-bold text-3xl">Welcome to my store</h1>
@auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
    @endauth

    <a href="{{route('products')}}" class="rounded bg-blue-500 text-white mx-auto">Browese products</a>
</div>
@endsection
