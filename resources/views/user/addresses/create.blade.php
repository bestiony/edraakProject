@extends('layouts.main')
@section('content')
<section class="mt-40">
    <div class="container mx-auto flex justify-around items-start">
        <!-- use new address -->
        <form action="{{route('checkout',['oldaddress'=>0])}}"
                method="get"
                class="p-6 space-y-2 flex flex-col md:w-96 w-5/6 bg-white">
            @csrf
            <h2 class="font-bold text-2xl">
                Add a new address
            </h2>
            <!-- country -->
            <div class="flex flex-col">
                <label for="country" class="font-bold ">Country</label>
                <x-countries-drowpdown />
                @error('country')
                <p class="text-red-500 text-sm">
                    {{$message}}
                </p>
                @enderror
            </div>

            <!-- address 1 -->
            <div class="flex flex-col">
                <label for="address_line_1" class="font-bold ">Address Line 1</label>
                <input value="{{old('address_line_1')}}" type="text" name="address_line_1" id="address_line_1"
                    class="outline-orange-500 p-2 border">
                    @error('address_line_1')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror            </div>

            <!-- address 2 -->
            <div class="flex flex-col">
                <label for="address_line_2" class="font-bold ">Address Line 2</label>
                <input value="{{old('address_line_2')}}" type="text" name="address_line_2" id="address_line_2"
                    class="outline-orange-500 p-2 border">
                    @error('address_line_2')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            <!-- city -->
            <div class="flex flex-col">
                <label for="city" class="font-bold ">City</label>
                <input value="{{old('city')}}" type="text" name="city" id="city"
                    class="outline-orange-500 p-2 border">
                    @error('city')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            <!-- state -->
            <div class="flex flex-col">
                <label for="state" class="font-bold ">State</label>
                <input value="{{old('state')}}" type="text" name="state" id="state"
                    class="outline-orange-500 p-2 border">
                    @error('state')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            <!-- postal code  -->
            <div class="flex flex-col">
                <label for="postal_code" class="font-bold ">Postal Code</label>
                <input value="{{old('postal_code')}}" type="text" name="postal_code" id="postal_code"
                    class="outline-orange-500 p-2 border">
                    @error('postal_code')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            <button class="rounded my-4 bg-orange-500 text-white hover:bg-orange-300 py-2 px-4">Use Address</button>
        </form>
        <!-- use old address -->
        <div class="p-6 space-y-2 flex flex-col md:w-96 w-5/6 bg-white">
            <h2 class="font-bold text-2xl">
                Use an old address
            </h2>
                @foreach ($addresses as $address)
                    <x-address-card :address="$address"/>
                @endforeach

        </div>

    </div>
</section>

@endsection


