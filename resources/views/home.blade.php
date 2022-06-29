@extends('layouts.main')
@section('content')
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
