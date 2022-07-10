@props(['category'])

<div class="p-3 w-2/3 sm:w-1/2 md:w-1/4 max-h-96 flex flex-col
            items-center justify-end shadow-md
            hover:scale-110 duration-500 hover:border-orange-500 border rounded">
    <img src="{{asset($category->image->image_url)}}" class="max-h-60">
    <a href="{{route('products')}}/?category={{$category->id}}" class="text-xl hover:text-orange-500 cursor-pointer md:text-4xl text-center font-bold">
        {{$category->name}}
    </a>
    @if(Auth::guard('admin')->check())
    <div class="flex p-2 border-solid justify-center space-x-4 mt-auto">
        <a href="{{ route('admin.edit-category', ['category'=>$category->id]) }}" class="px-3 py-1 rounded bg-green-500 text-white hover:bg-green-300">
            Edit
        </a>
        <form method="POST" action="{{ route('admin.destroy-category', ['category'=>$category->id]) }}">
            @csrf
            @method('DELETE')
            {{-- <input type="hidden" name="name"> --}}
            <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-300">Delete</button>
        </form>

    </div>
    @endif
</div>
