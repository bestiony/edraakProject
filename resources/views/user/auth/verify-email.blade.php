@extends('layouts.auth-pages')
@section('content')
<section>
    <div class="container mx-auto p-6 flex flex-col items-center">
        <a href="{{route('home')}}" class="w-1/3 sm:w-1/6 mx-auto">
            <img class="" src="{{asset('storage/images/logo.png')}}" alt="">
        </a>
        <div class="w-full sm:w-96 mx-auto border p-3 flex flex-col
        py-10 px-5 space-y-4">

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
        <hr class="w-80 mx-auto my-10">

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf



                    <button class="bg-orange-500 py-2  px-4 rounded text-white
            hover:bg-orange-300 w-full sm:w-72 mx-auto">
                        {{ __('Resend Verification Email') }}
                    </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="w-16 underline text-sm text-gray-600 hover:text-orange-600">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>



    </div>
</section>
@endsection

