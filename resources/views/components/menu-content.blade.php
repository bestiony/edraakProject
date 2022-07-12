    <a href="{{route('products')}}" class="rounded hover:text-orange-500">Products</a>
    <a href="{{route('cart')}}" class="rounded hover:text-orange-500">Cart
    @if (session()->has('cart'))
        <span class="text-orange-500">
            ({{count(session('cart'))}})
        </span>
    @endif
    </a>
    @auth
    <a href="{{route('orders')}}" class="rounded hover:text-orange-500">Profile</a>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button>logout</button>
    </form>
    @else
    <a href="{{route('login')}}" class="rounded hover:text-orange-500">Login</a>
    <a href="{{route('register')}}" class="rounded hover:text-orange-500">register</a>
    <a href="{{route('admin.login')}}" class="fixed -right-4 px-2 py-1 -rotate-90 bg-black text-white top-6">Admin</a>
    @endauth
