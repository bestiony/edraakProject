@extends('layouts.auth-pages')
@section('content')
<section>
    <div class="container mx-ruto p-6 flex flex-col items-center">
        <a href="{{route('home')}}" class="w-1/3 sm:w-1/6 mx-auto">
            <img class="" src="{{asset('storage/images/logo.png')}}" alt="">
        </a>
        <form action="{{ route('register') }}" method="POST"
            class="w-full sm:w-96 mx-auto border p-5 flex flex-col
                space-y-1
            ">
            @csrf
            <h2 class="font-bold text-2xl">
                Register
            </h2>
            <!-- first_name -->
            <label class="font-bold" for="email">First Name</label>
            <input
            type="text" name="first_name" id="first_name"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            autofocus required value="{{old('first_name')}}">
            @error('first_name')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror

            <!-- last_name -->
            <label class="font-bold" for="email">Last Name</label>
            <input
            type="text" name="last_name" id="last_name"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            required value="{{old('last_name')}}">
            @error('last_name')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror

            <!-- email -->
            <label class="font-bold" for="email">Email</label>
            <input
            type="email" name="email" id="email"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            required value="{{old('email')}}">
            @error('email')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror
            <!-- password -->
            <label class="font-bold" for="password">Password</label>
            <input
            type="password" name="password" id="password"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            required>
            @error('password')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror

            <!-- password confirm-->
            <label class="font-bold" for="password_confirmation">Confirm Password</label>
            <input
            type="password" name="password_confirmation" id="password_confirmation"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            required>
            @error('password_confirmation')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
            @enderror
            <button class="bg-orange-500 py-2  px-4 rounded text-white
            hover:bg-orange-300 w-full sm:w-80 mx-auto">
            Register
        </button>
        <a href="{{route('login')}}" class="text-orange-500">I have an account!</a>
        </form>

        </div>
</section>
@endsection

