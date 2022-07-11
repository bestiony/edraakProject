@props(['subcategory'])

<div class="p-3 m-2 md:w-1/4 flex flex-col justify-end items-center shadow-md
            hover:-translate-y-4 duration-500 hover:border-orange-500 border rounded">
    <img src="{{asset($subcategory->image->image_url)}}" class="w-3/4 ">
    <a href="
    @if(Auth::guard('admin')->check())
    {{ route('admin.show-subcategory', ['subcategory'=>$subcategory->id]) }}
    @else
    {{route('products')}}/?subcategory={{$subcategory->id}}
    @endif
    " class="text-xl md:text-lg text-center cursor-pointer hover:text-orange-500 font-bold">
    {{$subcategory->name}}
    </a>
    @if(Auth::guard('admin')->check())
    <div class="flex p-2 border-solid justify-center space-x-4">
        <a href="{{ route('admin.edit-subcategory', ['subcategory'=>$subcategory->id]) }}" class="px-3 py-1 rounded bg-green-500 text-white hover:bg-green-300">
            Edit
        </a>
        <form method="POST" action="{{ route('admin.destroy-subcategory', ['subcategory'=>$subcategory->id]) }}"
            message='are you sure you want to delete this subcategory'
        onsubmit="showChecker(this.getAttribute('action'),this.getAttribute('message'),this.elements['_method'])">
            @csrf
            @method('DELETE')
            {{-- <input type="hidden" name="name"> --}}
            <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-300">Delete</button>
        </form>

    </div>
    @endif
</div>

