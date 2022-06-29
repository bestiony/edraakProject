@extends('layouts.main')
@section('content')
@php
$cart = session()->get('cart');
@endphp
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
