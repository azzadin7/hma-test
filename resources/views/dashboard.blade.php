@extends('layout')

@section('navbar')
    <nav class="text-black text-2xl">
        <ul>
            @foreach ($menus as $menu)
                <li class="py-3">
                    <img src="{{ $menu->menu_icon }}" alt="" class="h-10 float-left">
                    @if ( $menu->menu_name == 'Logout' )
                        <form action="{{ route('post.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="font-montserrat text-black">
                                {{ $menu->menu_name }}
                            </button>
                        </form>
                    @else
                        <a href="{{ $menu->menu_link }}" class="text-decoration-none font-montserrat text-black">{{ $menu->menu_name }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
@endsection

@section('content')
    {{-- Dashboard Pengguna --}}
    <div class="pb-52">
        <div class="text-3xl font-bold font-montserrat">Dashboard Pengguna</div>
        <div class="grid grid-cols-2 p-10 gap-10">
            <div id="total-user" class="col-span-1 bg-blue-600 text-white text-center p-10 rounded-2xl">
                <p class="text-9xl font-bold">{{ $countTotalUser }}</p>
                <p class="text-lg">PENGGUNA TERDAFTAR</p>
            </div>
            <div id="active-user" class="col-span-1 bg-blue-600 text-white text-center p-10 rounded-2xl">
                <p class="text-9xl font-bold">{{ $countActiveUser }}</p>
                <p class=text-lg>PENGGUNA AKTIF</p>
            </div>
        </div>
    </div>
@endsection