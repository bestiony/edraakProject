@extends('layouts.main')
@section('content')

<section class="mt-40">
    <div class="container mx-auto p-6 flex flex-col">

        <!-- top -->
        <div class="flex flex-col md:flex-row justify-center items-center">
            <!-- left -->
            <h3 class="font-bold text-4xl md:w-1/2">
                Order Confirmation
            </h3>
            <!-- right -->
            <div class="flex items-center md:w-1/2">

                <p class="text-sm w-2/6">Order Total: <span class="text-2xl font-bold">
                    ${{$total}}
                </span></p>
                <form class="w-4/6"
                action="{{route('confirm-order',['address'=>$address->id])}}"
                method="POST">
                @csrf
                <button class="bg-orange-500 text-white py-2 px-6 rounded
                text-xl w-full text-center md:ml-6
                hover:bg-orange-300">Place Order</button>
                </form>

            </div>
        </div>
        <div class="bg-white p-6 shadow my-6 flex flex-col md:flex-row">
            <!-- left -->
            <div class="flex flex-col md:w-1/2 mx-4">

                <h3 class="text-2xl border-gray-600 font-bold p-8  border-dashed border-b-2 w-full">
                    Your Information
                </h3>

                <!-- info -->
                <p class="text-lg px-8 py-2 font-bold">{{$user_name}}</p>
                <p class="text-lg px-8 py-2">{{$user_email}}</p>

                <h3 class="text-2xl border-gray-600 font-bold p-8  border-dashed border-b-2 w-full">
                    Payment
                </h3>

                <!-- options -->
                <div class="flex px-8">
                    <input checked class="px-8 py-2" type="radio" name="payment" value="on_delivery" id="">
                    <p class="text-lg px-8 py-2">On delivery</p>
                </div>

                <div class="flex px-8 items-center grayscale line-through">

                    <input disabled class="px-8 py-2" type="radio" name="payment" value="on_delivery" id="">
                    <img class="h-14 mx-6 border p-1" src="https://www.about-payments.com/logo/300/225/536" alt="">
                    <p class="text-lg px-8  ">Unavailable</p>
                    <hr class="w-full">
                </div>
            </div>

            <!-- right -->
            <div class="flex flex-col md:w-1/2 mx-4">
                <h3 class="text-2xl border-gray-600 font-bold p-8  border-dashed border-b-2 w-full">
                    Shipping Address
                </h3>

                <!-- info -->
                <p class="text-lg px-8 py-2 font-bold">{{$address->country}}</p>
                <p class="text-lg px-8 py-2">{{$address->address_line_1}}</p>
                <p class="text-lg px-8 py-2">{{$address->address_line_2}}</p>
                <p class="text-lg px-8 py-2">{{$address->state}}</p>
                <p class="text-lg px-8 py-2">{{$address->city}}</p>
                <p class="text-lg px-8 py-2">{{$address->postal_code}}</p>

            </div>

        </div>
    </div>

</section>


@endsection
