<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>Admin</title>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    {{-- flash message --}}
    @if(session()->has('error'))
    <div x-show="show" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
        class="fixed z-50  p-1 bg-red-500 text-white top-1/3 left-1/2 w-96 -translate-x-1/2">
        <div class="border p-2 w-full border-white rounded flex justify-between">
            <p>Error: {{session('error')}}</p>
            <button href="" @click="show = false">X</button>
        </div>
        </div>
    @endif
    @if(session()->has('message'))
    <div x-show="show" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
        class="fixed z-50 p-1 bg-green-500 text-white top-1/3 left-1/2 w-96 -translate-x-1/2">
        <div class="border p-2 w-full border-white rounded flex justify-between">

            <p>message: {{session('message')}}</p>
            <button href="" @click="show = false">X</button>
        </div>
        </div>
    @endif
    <section>

        <div class="container mx-auto p-6 flex">
            <a href="{{route('home')}}"><img src="{{asset('storage/images/logo.png')}}" alt="" class="h-8 w-auto"></a>
        </div>
    </section>
    <section>

        <div class="container mx-auto p-6 bg-white flex space-x-2">

            <!-- left : menu items  -->
            <ul class="w-9 sm:w-1/5 space-y-2 flex flex-col">
                <a href="{{route('admin.dashboard')}}">
                    <li class="border p-2 flex items-center hover:border-orange-500
                    @if(Request::is('admin/dashboard'))
                        text-orange-500 border-orange-500
                    @endif
                    ">
                        <i class="fa fa-tachometer" aria-hidden="true"> </i>
                        <span class="hidden sm:block">. Dashboard</span>
                    </li>
                </a>

                <a href="{{ route('admin.users') }}">
                    <li class="border flex items-center p-2 hover:border-orange-500
                    @if(Request::is('admin/users'))
                        text-orange-500 border-orange-500
                    @endif
                    "><i class="fa fa-users" aria-hidden="true"></i>
                    <span class="hidden sm:block">. Users</span> </li>
                </a>

                <a href="{{route('admin.orders')}}">
                    <li class="border flex items-center p-2 hover:border-orange-500
                    @if(Request::is('admin/orders'))
                        text-orange-500 border-orange-500
                    @endif
                    "><i class="fa fa-list" aria-hidden="true"></i>
                    <span class="hidden sm:block">. Orders</span></li>
                </a>

                <a href="{{route('admin.products')}}">
                    <li class="border flex items-center p-2 hover:border-orange-500
                    @if(Request::is('admin/products'))
                        text-orange-500 border-orange-500
                    @endif
                    "><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="hidden sm:block">. Products</span></li>
                </a>
                <a href="{{ route('admin.categories') }}">
                    <li class="border flex items-center p-2 hover:border-orange-500
                    @if(Request::is('admin/categories'))
                        text-orange-500 border-orange-500
                    @endif
                    "><i class="fa fa-square" aria-hidden="true"></i>
                        <span class="hidden sm:block">. Categories</span></li>
                </a>

                <a href="{{ route('admin.subcategories') }}">
                    <li class="border flex items-center p-2 hover:border-orange-500
                    @if(Request::is('admin/subcategories'))
                        text-orange-500 border-orange-500
                    @endif
                    "><i class="fa fa-sitemap" aria-hidden="true"></i>
                        <span class="hidden sm:block">. Subcategories</span></li>
                </a>

                    <li class="border  p-2 hover:border-orange-500 flex items-center">

                        <form action="{{route('admin.logout')}}" method="POST" >
                            @csrf
                        <button class="flex items-center w-full">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span class="hidden sm:block">. logout</span></button>
                        </form></li>

            </ul>
            <!-- right : item view -->
            <div class="w-4/5 border p-6">
                @yield('content')
            </div>
        </div>
    </section>
    <x-confirm-message/>

</body>
<script>
    function showChecker (destination,prompt,method){
            var box = document.getElementById('box');

            box.classList.remove('hidden');
            box.classList.add('flex');
            var message = document.getElementById('message');
            var form = document.getElementById('form');
            message.innerText = prompt
            form.action = destination
            event.preventDefault();
            form.appendChild(method);
        }
        function hideCkecker(){
            var box = document.getElementById('box');
            box.classList.remove('flex');
            box.classList.add('hidden');
            event.preventDefault();

        }
</script>
</html>
