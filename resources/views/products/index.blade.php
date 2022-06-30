@extends('layouts.main')
@section('content')
    <div class="container flex mx-auto p-6 flex-wrap justify-center">
        {{-- <div>{{Auth::user()->first_name??null}}</div> --}}
    @forelse ($products as $product)
        <x-card :product="$product"/>
    @empty
        <h1>nothing to see here </h1>
    @endforelse
</div>
{{$products->links()}}
@endsection

