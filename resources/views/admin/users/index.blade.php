@extends('layouts.admin')
@section('content')
<div class="container flex flex-col mx-auto p-4 space-y-4">
    <h1 class="font-bold text-2xl text-center">
        Users
    </h1>
    <div class="container  flex flex-col p-3 border-solid border-2 rounded">
        <table class="table-fixed border-separate border-spacing-y-2.5">
            <thead class="text-left bg-gray-50 ">
                <tr class="py-10 leading-10">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Orders</th>
                    <th>status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->orders->count()}}</td>
                    <td>{{$users_statuses[$user->status]}}</td>

                    <td>
                        <a
                            href="{{ route('admin.show-user', ['user'=>$user]) }}"
                            class="py-2 px-4 w-9 rounded bg-blue-500 text-white hover:bg-blue-300">
                                Details
                        </a>
                    </td>
                    <td>
                        @if ($user->status == 1)

                        <form method="POST" action="{{ route('updateStatus', ['user'=>$user->id,'status_code'=>0]) }}"
                            message='are you sure you want to ban user'
                            onsubmit="showChecker(this.getAttribute('action'),this.getAttribute('message'),this.elements['_method'],this.elements['_token'])">
                            @csrf
                            <button class="py-2 px-4 w-20 rounded bg-red-500 text-white hover:bg-red-300">
                                Ban
                            </button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('updateStatus', ['user'=>$user->id,'status_code'=>1]) }}"
                            message='are you sure you want to Unban user'
                            onsubmit="showChecker(this.getAttribute('action'),this.getAttribute('message'))">
                            @csrf
                            <button class="py-2 px-4 w-20 rounded bg-green-500 text-white hover:bg-red-300">
                                Unban
                            </button>
                        </form>
                        @endif

                    </td>
                </tr>
                @empty
                    <h2 class="text-xl font-bold">
                        You Don't Have Any Users Yet !
                    </h2>
                @endforelse

            </tbody>
        </table>

    </div>




</div>
@endsection


