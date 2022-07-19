@extends('layouts.auth-pages')
@section('content')
<section>
    <div class="container mx-auto p-6 flex flex-col items-center">
        <a href="{{route('home')}}" class="w-1/3 sm:w-1/6 mx-auto">
            <img class="" src="{{asset('storage/images/logo.png')}}" alt="">
        </a>
        <form action="{{ route('password.update') }}" method="POST"
            class="w-full sm:w-96 mx-auto border p-5 flex flex-col
                space-y-1
            ">
            @csrf

            <h2 class="font-bold text-2xl">
                Reset Password
            </h2>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            @if ($errors->any())

            <div class="text-red-400">
                Ops something went wrong
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            * {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif



            <!-- email -->
            <label class="font-bold" for="email">Email</label>
            <input
            type="email" name="email" id="email"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            required value="{{old('email', $request->email)}}" readonly>
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
            Reset Password
        </button>
        </form>

        </div>
</section>
@endsection

