@extends('layouts.admin')
@section('content')
<div class="container flex flex-wrap mx-auto p-4 justify-center">

    @forelse ($products as $product)
    <x-h-card :product="$product"/>
    @empty
    <h1>nothing to see here </h1>
    @endforelse




</div>
@endsection
