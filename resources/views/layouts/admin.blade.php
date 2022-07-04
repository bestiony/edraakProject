<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>admin</title>
</head>
<body>
    <h1 class="font-bold my-4  w-sm">welcome home boss</h1>
    <form action="{{route('admin.logout')}}" method="POST">
        @csrf
        <input type="submit" value="Logout">
    </form>
    <div class="container w-screen flex">
        <div class="flex flex-col w-1/5 border-2 border-red-400 border-solid">
            <ul>
                <a href="{{route('admin.orders')}}"><li>orders</li></a>
                <a href="{{route('admin.products')}}"><li>products</li></a>
                <a href="{{ route('admin.users') }}"><li>users</li></a>
                <a href="{{ route('admin.categories') }}"><li>categories</li></a>
                <a href="{{ route('admin.subcategories') }}"><li>subcategories</li></a>
            </ul>
        </div>
        <div class="container  flex flex-col w-3/4 border-2 border-solid border-gray-300">
            <h1>hello</h1>
            @yield('content')
        </div>

    </div>

</body>
</html>
