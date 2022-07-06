<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.5.2/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.5.2/dist/css/glide.theme.min.css">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/images/icon.png')}}">

    <title>Amouna</title>
</head>
<body>
     <!-- nav bar -->
     <nav class="shadow-md  relative bg-red-200 z-40 " >
        <div class="bg-white  shadow-md fixed top-0 left-0 right-0">
        <div class="container mx-auto bg-white  flex p-6 flex-wrap  ">
            <a href="{{route('home')}}">
            <img src="{{asset('storage/images/logo.png')}}" class="h-10 ">
            </a>
            <!-- search -->
            <form action="" class="flex order-last  items-center rounded-md border w-full md:w-1/2 p-1
            border-gray-400 mx-auto ">
                <input type="text" name="search" id="" class="w-full p-1 rounded-md  focus:outline-none  ">
                <button>
                    <i class="fa fa-search text-orange-500 mr-1 text-lg " aria-hidden="true"></i>
                </button>
            </form>

            <!-- menu -->
            <ul class="flex p-1 md:order-last ml-auto items-center space-x-4 px-4">
                <a href="{{route('products')}}" class="rounded hover:text-orange-500">Products</a>
                <a href="{{route('cart')}}" class="rounded hover:text-orange-500">Cart</a>
                @auth
                <a href="{{route('orders')}}" class="rounded hover:text-orange-500">Profile</a>
                @else
                <a href="{{route('login')}}" class="rounded hover:text-orange-500">Login</a> 
                <a href="{{route('register')}}" class="rounded hover:text-orange-500">register</a>
                @endauth
            </ul>
        </div>
        </div>
    </nav>
@yield('content')

    <!-- footer -->

    <footer class="bg-gray-900">
        <div class="container flex-col md:flex-row mx-auto justify-between flex items-stretch p-16 ">
            <!-- left -->
            <img src="{{asset('storage/images/logo-white.png')}}" class="sm:1/2 md:w-1/5 self-center">

            <!-- middle -->

            <div class="md:p-6 text-white flex flex-col md:w-1/3 items-center">
                <ul class="flex sm:block ">
                    <li>Products</li> <p class="text-white sm:hidden">|</p>
                    <li>Contact US</li><p class="text-white sm:hidden">|</p>
                    <li>Careers </li><p class="text-white sm:hidden">|</p>
                    <li>Privacy Policy</li>
                </ul>
            </div>
            <!-- right -->
            <div class="flex flex-col justify-around items-stretch  content-between md:w-1/3">
                <h2 class="text-white font-bold text-center my-5">
                    Follow US
                </h2>
                <div class="flex justify-between">
                    <img src="{{asset('storage/images/social/icon-facebook.svg')}}" alt="">
                    <img src="{{asset('storage/images/social/icon-instagram.svg')}}" alt="">
                    <img src="{{asset('storage/images/social/icon-pinterest.svg')}}" alt="">
                    <img src="{{asset('storage/images/social/icon-twitter.svg')}}" alt="">
                    <img src="{{asset('storage/images/social/icon-youtube.svg')}}" alt="">
                </div>
            </div>

        </div>
        <hr class="border-white md:w-1/3 mx-auto">
        <p class="py-6 text-white text-center">
            Copyrights reserved Bestiony 2022
        </p>
    </footer>



    <!-- js -->
    <!-- glide js -->
    <script src="https://unpkg.com/@glidejs/glide@3.5.2/dist/glide.min.js"></script>
    <script>
        new Glide('.glide',{
            // autoplay: 2000,
            // hoverpause: false,
            // perView: 1
        }).mount()
    </script>

</body>
</html>
