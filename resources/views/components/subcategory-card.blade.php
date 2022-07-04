@props(['subcategory'])


<div class="rounded flex flex-col flex-wrap md:w-1/4 h- p-2 border-solid border-gray-400 drop-shadow border-2">
    <a href="{{ route('admin.show-subcategory', ['subcategory'=>$subcategory->id]) }}" class="text-xl text-red-400 text-center">
        {{$subcategory->name}}
    </a>
    <p class="text-sm">Subcategories</p>
    <ul>
        @foreach ($subcategory->categories as $category)
        <li>--->{{$category->name}} </li>
        @endforeach
    </ul>
    <div class="flex p-2 border-solid justify-center space-x-4">
        <a href="{{ route('admin.edit-subcategory', ['subcategory'=>$subcategory->id]) }}" class="px-3 py-1 rounded bg-green-500 text-white hover:bg-green-300">
            Edit
        </a>
        <form method="POST" action="{{ route('admin.destroy-subcategory', ['subcategory'=>$subcategory->id]) }}">
            @csrf
            @method('DELETE')
            {{-- <input type="hidden" name="name"> --}}
            <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-300">Delete</button>
        </form>

    </div>
</div>
