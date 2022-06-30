<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
    <h1 class="font-bold my-4  w-sm">Amouna</h1>
    <a href="{{route('home')}}" class="rounded bg-green-600 text-white px-4 py-2 hover:bg-green-400">Home</a>
    <a href="{{route('cart')}}" class="rounded bg-red-600 text-white px-4 py-2 hover:bg-red-400">cart</a>
    <a href="{{route('orders')}}" class="rounded bg-blue-600 text-white px-4 py-2 hover:bg-blue-400">orders</a>
    @yield('content')
</body>
</html>
