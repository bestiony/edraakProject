@extends('layouts.auth-pages')
@section('content')
<section>
    <div class="container mx-ruto p-6 flex flex-col items-center">
        <a href="{{route('home')}}" class="w-1/3 sm:w-1/6 mx-auto">
            <img class="" src="{{asset('storage/images/logo.png')}}" alt="">
        </a>
        <form action="{{ route('login') }}" method="POST"
            class="w-full sm:w-96 mx-auto border p-3 flex flex-col
                py-10 px-5 space-y-4
            ">
            @csrf
            <h2 class="font-bold text-2xl">
                Sign in
            </h2>
            <!-- email -->
            <label class="font-bold" for="email">Email</label>
            <input
            type="email" name="email" id="email"
            placeholder="example@sth.com"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            autofocus required>
            @error('email')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror
            <!-- password -->
            <label class="font-bold" for="email">Password</label>
            <input
            type="password" name="password" id="password"
            placeholder="********"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            required>
            @error('password')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror
            <button class="bg-orange-500 py-2  px-4 rounded text-white
            hover:bg-orange-300 w-full sm:w-80 mx-auto">
                Sign In
            </button>
        </form>
        <hr class="w-96 mx-auto my-10">
        <div class="px-5 w-full flex  justify-center">

            <a href="{{route('register')}}" class="bg-orange-500 w-full sm:w-80  py-2 px-4 rounded text-white
            hover:bg-orange-300 text-center">Create new account</a>
        </div>
        </div>
</section>
@endsection

