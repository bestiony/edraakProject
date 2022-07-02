@extends('layouts.main')
@section('content')
@php
$cart = session()->get('cart');
@endphp

<form action="{{route('confirm-order')}}" class="w-1/3 flex flex-col mx-auto space-y-4 " method="POST">
@csrf

<label for="address_line_1"> address line 1</label>
<input class="border outline-4 px-4 py-2 m-4" type="text" name="address_line_1" id="address_line_1" required>
<label for="address_line_2"> address line 2</label>
<input class="border outline-4 px-4 py-2 m-4" type="text" name="address_line_2" id="address_line_2">
<label for="city"> city</label>
<input class="border outline-4 px-4 py-2 m-4" type="text" name="city" id="city" required>
<label for="state"> state</label>
<input class="border outline-4 px-4 py-2 m-4" type="text" name="state" id="state">
<label for="country"> country</label>
<input class="border outline-4 px-4 py-2 m-4" type="text" name="country" id="country" required>
<label for="postal_code"> postal_code</label>
<input class="border outline-4 px-4 py-2 m-4" type="text" name="postal_code" id="postal_code" required>
<button class=" w-1/5 mx-auto rounded bg-green-600 text-white hover:bg-green-300" type="submit">submit</button>
</form>
<div class="w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Username
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
        <p class="text-red-500 text-xs italic">Please choose a password.</p>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
          Sign In
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
          Forgot Password?
        </a>
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      &copy;2020 Acme Corp. All rights reserved.
    </p>
  </div>




<table>
    <tr>
        <th>name</th>
        <th>quantity</th>
        <th>price</th>
        <th>total</th>
    </tr>
    @foreach($cart as $item)
        <tr>
            <td>{{$item['product']->name}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['product']->price}}</td>
            <td>{{$item['product']->price * $item['quantity'] }}</td>
        </tr>
    @endforeach
</table>

@endsection
