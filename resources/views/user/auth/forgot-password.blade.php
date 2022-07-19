@extends('layouts.auth-pages')
@section('content')
<section>
    <div class="container mx-auto p-6 flex flex-col items-center">
        <a href="{{route('home')}}" class="w-1/3 sm:w-1/6 mx-auto">
            <img class="" src="{{asset('storage/images/logo.png')}}" alt="">
        </a>


        <form action="{{ route('password.email') }}" method="POST"
            class="w-full sm:w-96 mx-auto border p-3 flex flex-col
                py-10 px-5 space-y-4
            ">
            @csrf
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            @if (session('status'))
            <p class="text-green-400">
                {{session('status')}}
            </p>

            @endif
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
            placeholder="example@sth.com"
            class="border rounded p-2 focus:outline-orange-500
            outline-offset-2 focus:shadow-lg focus:shadow-orange-400/40 "
            autofocus required>


            <button class="bg-orange-500 py-2  px-4 rounded text-white
            hover:bg-orange-300 w-full sm:w-80 mx-auto">
                Send Password reset link
            </button>
        </form>

        </div>
</section>
@endsection

