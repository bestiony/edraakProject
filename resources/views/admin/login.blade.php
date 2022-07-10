<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>

    <a href="{{route('home')}}" class="w-48 mt-10 block mx-auto">
        <img class="w-48" src="{{asset('storage/images/logo.png')}}" alt="">
    </a>

<div class="container flex mx-auto p-10 justify-center  ">
    <form method="POST" class="w-3/4 md:w-2/5 p-6 flex flex-col border-solid border-2" action="{{route('admin.login')}}">
        @csrf
        <h1 class="text-center text-3xl">Admin Login</h1>
        <label class="p-3 m-3 " for="email">Email</label>
        <input class="border-2 border-solid border-gray-400 p-3 m-3" type="email" name="email" placeholder="email" id="">
        @error('email')
            <p class="text-red-600 p-2">{{$message}}</p>
        @enderror
        <label class="p-3 m-3 " for="password">Password</label>
        <input class="border-2 border-solid border-gray-400 p-3 m-3" type="password" name="password" placeholder="email" id="">
        <input type="submit" value="Login " class="w-20 mx-auto m-3 p-3 rounded hover:cursor-pointer border-2 border-solid" >
        @error('email')
            <p class="text-red p-2">{{$message}}</p>
        @enderror
    </form>
</div>
</body>
</html>
