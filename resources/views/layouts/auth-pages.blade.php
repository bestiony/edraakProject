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
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>Amouna</title>
</head>
<body>
    {{-- flash message --}}
    @if(session()->has('error'))
    <div x-show="show" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
        class="fixed z-50 p-1 bg-red-500 text-white top-1/3 left-1/2 w-96 -translate-x-1/2">
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
    @yield('content')
</body>
</html>
