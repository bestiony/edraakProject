<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Admin</title>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <section>
        <div class="container mx-auto p-6 flex">
            <img src="{{asset('storage/images/logo.png')}}" alt="" class="h-8 w-auto">
        </div>
    </section>
    <section>

        <div class="container mx-auto p-6 bg-white flex space-x-2">

            <!-- left : menu items  -->
            <ul class="w-1/5 space-y-2 flex flex-col">
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

                    <li class="border flex p-2 hover:border-orange-500 flex items-center">

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
</body>

</html>
